<?php
/**
 * Career Form Handler
 * Placeholder - replace with actual email sending / file upload logic
 */

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../careers.php');
    exit;
}

// Sanitize inputs
$firstName = htmlspecialchars(trim($_POST['first_name'] ?? ''), ENT_QUOTES, 'UTF-8');
$lastName = htmlspecialchars(trim($_POST['last_name'] ?? ''), ENT_QUOTES, 'UTF-8');
$email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$phone = htmlspecialchars(trim($_POST['phone'] ?? ''), ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars(trim($_POST['message'] ?? ''), ENT_QUOTES, 'UTF-8');

// Validate
$errors = [];
if (empty($firstName)) $errors[] = 'First name is required.';
if (empty($lastName)) $errors[] = 'Last name is required.';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email is required.';
if (empty($phone)) $errors[] = 'Phone number is required.';

// Handle file upload
if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
    $allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
    $maxSize = 5 * 1024 * 1024; // 5MB

    if (!in_array($_FILES['resume']['type'], $allowedTypes)) {
        $errors[] = 'Resume must be PDF or DOC/DOCX format.';
    }
    if ($_FILES['resume']['size'] > $maxSize) {
        $errors[] = 'Resume file size must be under 5MB.';
    }
}

if (!empty($errors)) {
    header('Location: ../careers.php?status=error');
    exit;
}

// TODO: Implement actual file upload and email sending
// Move uploaded file to secure directory
// Send notification email

// Redirect with success
header('Location: ../careers.php?status=success');
exit;
