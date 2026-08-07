<?php
/**
 * SiteMailer — thin wrapper around PHPMailer.
 *
 * Reads SMTP settings from config/smtp.php (or environment variables via
 * config.php), supports a 'log' driver for local development/testing, and
 * keeps all email logic in one place.
 *
 * Usage:
 *   $ok = SiteMailer::send($to, $subject, $bodyHtml, $attachmentPaths = [], $replyTo = null);
 */
require_once __DIR__ . '/phpmailer/PHPMailer.php';
require_once __DIR__ . '/phpmailer/SMTP.php';
require_once __DIR__ . '/phpmailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as MailerException;

class SiteMailer
{
    /** Resolve the effective SMTP settings (env > config/smtp.php > defaults). */
    public static function settings()
    {
        $defaults = [
            'host'       => 'localhost',
            'port'       => 25,
            'username'   => '',
            'password'   => '',
            'secure'     => '',
            'from_email' => 'no-reply@localhost',
            'from_name'  => SITE_NAME,
            'to_contact' => defined('CONTACT_EMAIL') ? CONTACT_EMAIL : 'admin@localhost',
            'to_careers' => defined('CONTACT_EMAIL') ? CONTACT_EMAIL : 'admin@localhost',
            'driver'     => 'smtp',
        ];

        $file = dirname(__DIR__) . '/config/smtp.php';
        if (is_file($file)) {
            $user = require $file;
            if (is_array($user)) {
                $defaults = array_merge($defaults, $user);
            }
        }

        $env = [
            'host'       => getenv('SMTP_HOST'),
            'port'       => getenv('SMTP_PORT'),
            'username'   => getenv('SMTP_USERNAME'),
            'password'   => getenv('SMTP_PASSWORD'),
            'secure'     => getenv('SMTP_SECURE') !== false ? getenv('SMTP_SECURE') : null,
            'from_email' => getenv('SMTP_FROM_EMAIL'),
            'from_name'  => getenv('SMTP_FROM_NAME'),
            'to_contact' => getenv('SMTP_TO_CONTACT'),
            'to_careers' => getenv('SMTP_TO_CAREERS'),
            'driver'     => getenv('MAIL_DRIVER'),
        ];

        foreach ($env as $key => $value) {
            if ($value !== false && $value !== null && $value !== '') {
                $defaults[$key] = $value;
            }
        }

        return $defaults;
    }

    /**
     * Send an email.
     *
     * @param string $to            Recipient address.
     * @param string $subject       Email subject.
     * @param string $bodyHtml      HTML body.
     * @param array  $attachments   List of absolute file paths to attach.
     * @param array|null $replyTo   ['email' => ..., 'name' => ...] or null.
     * @param string $plainBody     Optional plain-text body (auto-derived if empty).
     * @return array  ['ok' => bool, 'error' => string|null]
     */
    public static function send($to, $subject, $bodyHtml, $attachments = [], $replyTo = null, $plainBody = '')
    {
        $s = self::settings();

        if ($s['driver'] === 'log') {
            return self::log($to, $subject, $bodyHtml, $attachments, $replyTo, $plainBody);
        }

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = $s['host'];
            $mail->SMTPAuth   = ($s['username'] !== '');
            $mail->Username   = $s['username'];
            $mail->Password   = $s['password'];
            $mail->SMTPSecure = $s['secure'];
            $mail->Port       = (int) $s['port'];
            $mail->CharSet    = 'UTF-8';
            $mail->SMTPDebug  = 0; // never leak SMTP details to the browser
            $mail->Timeout    = 15;

            $mail->setFrom($s['from_email'], $s['from_name']);
            $mail->addAddress($to);
            if ($replyTo && filter_var($replyTo['email'], FILTER_VALIDATE_EMAIL)) {
                $mail->addReplyTo($replyTo['email'], isset($replyTo['name']) ? $replyTo['name'] : '');
            }

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $bodyHtml;
            $mail->AltBody = $plainBody !== '' ? $plainBody : strip_tags(str_replace(['<br>', '<br/>', '<br />', '</p>', '</li>', '</tr>', '</td>'], "\n", $bodyHtml));

            foreach ($attachments as $path) {
                if (is_file($path)) {
                    $mail->addAttachment($path);
                }
            }

            $mail->send();
            return ['ok' => true, 'error' => null];
        } catch (MailerException $e) {
            return ['ok' => false, 'error' => 'Mailer error: ' . $e->getMessage()];
        } catch (\Exception $e) {
            return ['ok' => false, 'error' => 'Mailer error: ' . $e->getMessage()];
        }
    }

    /** Log driver — writes a raw "email" to storage/logs/email.log instead of sending. */
    private static function log($to, $subject, $bodyHtml, $attachments, $replyTo, $plainBody)
    {
        $dir = dirname(__DIR__) . '/storage/logs';
        if (!is_dir($dir) && !mkdir($dir, 0775, true) && !is_dir($dir)) {
            return ['ok' => false, 'error' => 'Log directory is not writable: ' . $dir];
        }

        $body = $plainBody !== '' ? $plainBody : strip_tags(str_replace(['<br>', '<br/>', '<br />', '</p>', '</li>', '</tr>', '</td>'], "\n", $bodyHtml));
        $line = '[' . date('Y-m-d H:i:s') . '] To: ' . $to
              . ' | Subject: ' . $subject
              . ' | ReplyTo: ' . (isset($replyTo['email']) ? $replyTo['email'] : '-')
              . ' | Attachments: ' . implode(', ', array_map('basename', $attachments))
              . PHP_EOL . $body . PHP_EOL . str_repeat('-', 60) . PHP_EOL;

        if (file_put_contents($dir . '/email.log', $line, FILE_APPEND) === false) {
            return ['ok' => false, 'error' => 'Could not write to email log.'];
        }
        return ['ok' => true, 'error' => null];
    }
}
