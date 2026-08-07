<?php
/**
 * Shared helpers for POST handlers.
 * Responds with JSON when the request came from fetch()/AJAX,
 * otherwise redirects back with a ?status= param (no-JS fallback).
 */

function is_ajax_request()
{
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
        return true;
    }
    return strpos($_SERVER['HTTP_ACCEPT'] ?? '', 'application/json') !== false;
}

/**
 * @param int    $status    HTTP status code.
 * @param array  $payload   JSON payload (AJAX).
 * @param string $redirect  Back URL for the no-JS fallback (e.g. '../contact-us.php').
 */
function respond($status, $payload, $redirect)
{
    if (is_ajax_request()) {
        // Discard any stray output (e.g. PHP startup notices about the
        // upload temp file) so the response is always pure JSON.
        while (ob_get_level() > 0) {
            ob_end_clean();
        }
        http_response_code($status);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        exit;
    }

    $flag = $status >= 200 && $status < 300 ? 'success' : 'error';
    header('Location: ' . $redirect . '?status=' . $flag);
    exit;
}

/** Convenience wrapper for error-only responses. */
function respond_error($status, $message, $redirect)
{
    respond($status, ['ok' => false, 'message' => $message], $redirect);
}

/** Basic per-session rate limiter. Returns false and sends a 429 when the limit is hit. */
function rate_limit($key, $max, $windowSeconds, $redirect)
{
    csrf_start();
    $now = time();
    if (!isset($_SESSION[$key . '_window'])) {
        $_SESSION[$key . '_window'] = $now;
        $_SESSION[$key . '_count'] = 0;
    } elseif (($now - $_SESSION[$key . '_window']) >= $windowSeconds) {
        $_SESSION[$key . '_window'] = $now;
        $_SESSION[$key . '_count'] = 0;
    }

    if (($_SESSION[$key . '_count'] ?? 0) >= $max) {
        respond_error(429, 'Too many submissions. Please wait a few minutes and try again.', $redirect);
        return false;
    }
    return true;
}
