<?php
/**
 * Career Application Handler
 *
 * Validates the submission, securely stores the resume, and sends an email
 * (with the resume attached) via PHPMailer (SMTP).
 * Responds with JSON for the fetch() front-end, or redirects back with
 * ?status= for browsers without JavaScript.
 */
require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/includes/csrf.php';
require_once dirname(__DIR__) . '/lib/Mailer.php';
require_once __DIR__ . '/helpers.php';

const CAREER_REDIRECT = '../careers.php';

// POST only
if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    respond_error(405, 'Method not allowed.', CAREER_REDIRECT);
}

// CSRF token
if (!csrf_verify($_POST['csrf_token'] ?? '')) {
    respond_error(400, 'Your session expired. Please refresh the page and try again.', CAREER_REDIRECT);
}

// Honeypot
if (trim($_POST['website'] ?? '') !== '') {
    respond(200, ['ok' => true, 'message' => 'Thank you! Your application has been received. We will be in touch soon.'], CAREER_REDIRECT);
}

// Rate limit: 2 applications per 10 minutes per session
rate_limit('career', 2, 600, CAREER_REDIRECT);

// Collect + sanitize
$firstName = trim($_POST['first_name'] ?? '');
$lastName  = trim($_POST['last_name'] ?? '');
$email     = trim($_POST['email'] ?? '');
$phone     = trim($_POST['phone'] ?? '');
$message   = trim($_POST['message'] ?? '');
$fullName  = trim($firstName . ' ' . $lastName);

// Server-side validation
$errors = [];
if ($firstName === '' || mb_strlen($firstName) > 100 || preg_match('/[\r\n]/', $firstName)) {
    $errors['first_name'] = 'Please enter your first name.';
}
if ($lastName === '' || mb_strlen($lastName) > 100 || preg_match('/[\r\n]/', $lastName)) {
    $errors['last_name'] = 'Please enter your last name.';
}
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($email) > 200) {
    $errors['email'] = 'Please enter a valid email address.';
}
if ($phone === '' || !preg_match('/^[0-9+\-\s()]{6,20}$/', $phone)) {
    $errors['phone'] = 'Please enter a valid phone number.';
}
if (mb_strlen($message) > 2000) {
    $errors['message'] = 'Message must be under 2000 characters.';
}

// Resume upload validation
$allowedExt = array_map('trim', explode(',', RESUME_ALLOWED_EXT));

if (!isset($_FILES['resume']) || $_FILES['resume']['error'] === UPLOAD_ERR_NO_FILE) {
    $errors['resume'] = 'Please attach your resume (PDF, DOC or DOCX, max 5 MB).';
} elseif ($_FILES['resume']['error'] !== UPLOAD_ERR_OK) {
    $errors['resume'] = 'The file could not be uploaded. Please try again.';
} else {
    $file = $_FILES['resume'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (!in_array($ext, $allowedExt, true)) {
        $errors['resume'] = 'Resume must be a PDF, DOC or DOCX file.';
    } elseif ($file['size'] > RESUME_MAX_SIZE || $file['size'] === 0) {
        $errors['resume'] = 'Resume file size must be under 5 MB.';
    } else {
        // Verify real MIME type from content, not the client-supplied header.
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($file['tmp_name']);
        $okMime = [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ];
        // Some servers report application/octet-stream for valid DOC/DOCX; fall back to the extension check.
        if (!in_array($mime, $okMime, true) && $mime !== 'application/octet-stream') {
            $errors['resume'] = 'The file type is not allowed. Please upload a PDF, DOC or DOCX.';
        }
    }
}

if (!empty($errors)) {
    respond(422, ['ok' => false, 'errors' => $errors, 'message' => 'Please correct the highlighted fields.'], CAREER_REDIRECT);
}

// Secure storage: random filename in a directory blocked from direct web access.
if (!is_dir(RESUMES_PATH)) {
    mkdir(RESUMES_PATH, 0775, true);
}

$ext = strtolower(pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION));
$safeName = date('Ymd') . '-' . bin2hex(random_bytes(8)) . '.' . $ext;
$resumePath = RESUMES_PATH . '/' . $safeName;

if (!move_uploaded_file($_FILES['resume']['tmp_name'], $resumePath)) {
    respond_error(500, 'Sorry, we could not save your resume. Please try again.', CAREER_REDIRECT);
}

// Build email body (HTML).
$body = '<p><strong>New job application received from the website.</strong></p>'
      . '<table border="1" cellpadding="8" cellspacing="0" style="border-collapse:collapse;font-family:Arial,sans-serif;font-size:14px;">'
      . '<tr><th align="left">Name</th><td>' . htmlspecialchars($fullName, ENT_QUOTES, 'UTF-8') . '</td></tr>'
      . '<tr><th align="left">Email</th><td>' . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . '</td></tr>'
      . '<tr><th align="left">Phone</th><td>' . htmlspecialchars($phone, ENT_QUOTES, 'UTF-8') . '</td></tr>'
      . '<tr><th align="left">Message</th><td>' . nl2br(htmlspecialchars($message !== '' ? $message : '-', ENT_QUOTES, 'UTF-8')) . '</td></tr>'
      . '<tr><th align="left">Resume</th><td>' . htmlspecialchars($safeName, ENT_QUOTES, 'UTF-8') . '</td></tr>'
      . '</table>';

$settings = SiteMailer::settings();
$result = SiteMailer::send(
    $settings['to_careers'],
    'Job application from ' . $fullName,
    $body,
    [$resumePath],
    ['email' => $email, 'name' => $fullName]
);

if (!$result['ok']) {
    error_log('[career-form] ' . $result['error']);
    // Keep the uploaded resume so it is not lost; the client can still retrieve it.
    respond_error(500, 'Sorry, we could not send your application right now. Please try again later.', CAREER_REDIRECT);
}

csrf_start();
$_SESSION['career_count'] = ($_SESSION['career_count'] ?? 0) + 1;

respond(200, ['ok' => true, 'message' => 'Thank you! Your application has been received. We will be in touch soon.'], CAREER_REDIRECT);
