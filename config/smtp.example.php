<?php
/**
 * SMTP Configuration (example template)
 *
 * COPY this file to config/smtp.php (it is git-ignored) and fill in the
 * real credentials. Do NOT commit real credentials to git.
 *
 * For Gmail: turn on 2-Step Verification, create an App Password at
 * https://myaccount.google.com/apppasswords, put the Gmail address in
 * 'username' and 'from_email', and paste the App Password into 'password'
 * (Gmail rejects your normal login password).
 *
 * Alternatively, set the environment variables listed below — they take
 * precedence over this file — e.g. via the hosting control panel, .env,
 * or getenv() in PHP-FPM / Docker.
 *
 * Supported environment variables:
 *   SMTP_HOST       e.g. smtp.gmail.com
 *   SMTP_PORT       e.g. 587
 *   SMTP_USERNAME   SMTP login username
 *   SMTP_PASSWORD   SMTP login password
 *   SMTP_SECURE     tls | ssl | empty string
 *   SMTP_FROM_EMAIL Sender email address
 *   SMTP_FROM_NAME  Sender display name
 *   SMTP_TO_CONTACT Recipient for contact-form enquiries
 *   SMTP_TO_CAREERS Recipient for job applications
 *   MAIL_DRIVER     smtp (default) | log (writes to storage/logs/email.log for local testing)
 */
return [
    // SMTP server
    'host'     => 'smtp.gmail.com',
    'port'     => 587,
    'username' => 'your-gmail-address@gmail.com',
    'password' => 'your-16-char-app-password',
    'secure'   => 'tls', // 'tls', 'ssl' or '' (no encryption)

    // Sender
    'from_email' => 'your-gmail-address@gmail.com',
    'from_name'  => 'Nani Transformers',

    // Recipients
    'to_contact' => 'the-inbox-that-receives@gmail.com',
    'to_careers' => 'the-inbox-that-receives@gmail.com',

    // 'smtp' for real delivery, 'log' to write emails to storage/logs/email.log (for local dev/test)
    'driver'     => 'smtp',
];
