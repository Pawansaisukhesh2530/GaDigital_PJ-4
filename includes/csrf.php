<?php
/**
 * CSRF protection helpers (session-based).
 * Call csrf_start() early (in config.php) to ensure the session is available.
 */

function csrf_start()
{
    if (session_status() === PHP_SESSION_NONE) {
        $sessionDir = __DIR__ . '/../storage/sessions';
        if (!is_dir($sessionDir) && !@mkdir($sessionDir, 0775, true) && !is_dir($sessionDir)) {
            $sessionDir = sys_get_temp_dir();
        }
        if (is_writable($sessionDir)) {
            session_save_path($sessionDir);
        }
        session_start();
    }
}

function csrf_token()
{
    csrf_start();
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrf_field()
{
    return '<input type="hidden" name="csrf_token" value="' . htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8') . '">';
}

function csrf_verify($token)
{
    csrf_start();
    return isset($_SESSION['csrf_token'], $token)
        && is_string($token)
        && hash_equals($_SESSION['csrf_token'], $token);
}
