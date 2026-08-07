<?php
/**
 * Contact Form Handler
 * Placeholder - replace with actual email sending logic
 */

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../contact-us.php');
    exit;
}

// Sanitize inputs
$name = htmlspecialchars(trim($_POST['name'] ?? ''), ENT_QUOTES, 'UTF-8');
$lastName = htmlspecialchars(trim($_POST['last_name'] ?? ''), ENT_QUOTES, 'UTF-8');
$fullName = trim($name . ' ' . $lastName);
$email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$phone = htmlspecialchars(trim($_POST['phone'] ?? ''), ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars(trim($_POST['message'] ?? ''), ENT_QUOTES, 'UTF-8');

// Validate (First Name, Email and Phone are required - matches the original)
$errors = [];
if (empty($name)) $errors[] = 'First name is required.';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email is required.';
if (empty($phone)) $errors[] = 'Phone number is required.';

if (!empty($errors)) {
    // Redirect back with error (in production, use sessions for flash messages)
    header('Location: ../contact-us.php?status=error');
    exit;
}

// TODO: Implement actual email sending
// mail('nanitransformers@gmail.com', 'Contact enquiry from ' . $fullName, $message);

// Redirect with success
header('Location: ../contact-us.php?status=success');
exit;
