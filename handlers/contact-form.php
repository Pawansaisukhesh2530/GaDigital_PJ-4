<?php
/**
 * Contact Form Handler
 *
 * Validates the submission, then sends an email via PHPMailer (SMTP).
 * Responds with JSON for the fetch() front-end, or redirects back with
 * ?status= for browsers without JavaScript.
 */
require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/includes/csrf.php';
require_once dirname(__DIR__) . '/lib/Mailer.php';
require_once __DIR__ . '/helpers.php';

const CONTACT_REDIRECT = '../contact-us.php';

// POST only
if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    respond_error(405, 'Method not allowed.', CONTACT_REDIRECT);
}

// CSRF token
if (!csrf_verify($_POST['csrf_token'] ?? '')) {
    respond_error(400, 'Your session expired. Please refresh the page and try again.', CONTACT_REDIRECT);
}

// Honeypot — bots fill hidden fields; real users leave them empty
if (trim($_POST['website'] ?? '') !== '') {
    respond(200, ['ok' => true, 'message' => 'Thank you for your message. We will get back to you shortly.'], CONTACT_REDIRECT);
}

// Rate limit: 3 messages per 10 minutes per session
rate_limit('contact', 3, 600, CONTACT_REDIRECT);

// Collect + sanitize
$name = trim($_POST['name'] ?? '');
$lastName = trim($_POST['last_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$message = trim($_POST['message'] ?? '');
$fullName = trim($name . ' ' . $lastName);

// Server-side validation
$errors = [];

if ($name === '' || mb_strlen($name) > 100) {
    $errors['name'] = 'Please enter your first name (max 100 characters).';
} elseif (preg_match('/[\r\n]/', $name) || preg_match('/[\r\n]/', $lastName)) {
    $errors['name'] = 'Invalid characters in name.';
}

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($email) > 200) {
    $errors['email'] = 'Please enter a valid email address.';
}

if ($phone === '' || !preg_match('/^[0-9+\-\s()]{6,20}$/', $phone)) {
    $errors['phone'] = 'Please enter a valid phone number.';
}

if ($message === '' || mb_strlen($message) > 2000) {
    $errors['message'] = 'Please enter a message (max 2000 characters).';
}

if (!empty($errors)) {
    respond(422, ['ok' => false, 'errors' => $errors, 'message' => 'Please correct the highlighted fields.'], CONTACT_REDIRECT);
}

// Build email body (HTML). All output escaped; PHPMailer prevents header injection.
$body = '<p><strong>New enquiry from the website contact form.</strong></p>'
      . '<table border="1" cellpadding="8" cellspacing="0" style="border-collapse:collapse;font-family:Arial,sans-serif;font-size:14px;">'
      . '<tr><th align="left">Name</th><td>' . htmlspecialchars($fullName, ENT_QUOTES, 'UTF-8') . '</td></tr>'
      . '<tr><th align="left">Email</th><td>' . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . '</td></tr>'
      . '<tr><th align="left">Phone</th><td>' . htmlspecialchars($phone, ENT_QUOTES, 'UTF-8') . '</td></tr>'
      . '<tr><th align="left">Message</th><td>' . nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8')) . '</td></tr>'
      . '</table>';

$settings = SiteMailer::settings();
$result = SiteMailer::send(
    $settings['to_contact'],
    'Website enquiry from ' . $fullName,
    $body,
    [],
    ['email' => $email, 'name' => $fullName]
);

if (!$result['ok']) {
    error_log('[contact-form] ' . $result['error']);
    respond_error(500, 'Sorry, we could not send your message right now. Please try again later.', CONTACT_REDIRECT);
}

csrf_start();
$_SESSION['contact_count'] = ($_SESSION['contact_count'] ?? 0) + 1;

respond(200, ['ok' => true, 'message' => 'Thank you for reaching out! Your message has been sent and our team will get back to you shortly.'], CONTACT_REDIRECT);
