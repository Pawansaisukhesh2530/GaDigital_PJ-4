# Nani Transformers - Static PHP Website

A clean, fast, and maintainable PHP rebuild of nanitransformers.com — without WordPress.

## Project Structure

```
project/
├── assets/
│   ├── css/                 # base, layout, header, footer, components,
│   │                        # buttons, forms, animations, responsive + page CSS
│   ├── js/main.js           # All vanilla JavaScript
│   ├── images/              # photos, banners, clients, products, gallery, projects
│   ├── icons/               # product/service/about icons (SVG + GIF)
│   └── videos/              # H.264/AAC MP4 clips (projects hero + gallery)
├── includes/                # Shared partials (head, header, footer, scripts,
│   │                        # config, csrf, product/service renderers, data files)
├── config/
│   ├── smtp.example.php     # SMTP template — copy to smtp.php and fill in
│   └── smtp.php             # (git-ignored) real SMTP credentials
├── handlers/                # POST endpoints (contact + career forms)
├── lib/Mailer.php           # PHPMailer wrapper (smtp / log drivers)
├── storage/logs/            # git-ignored runtime logs (email.log)
├── uploads/resumes/         # (git-ignored) stored resumes, web-denied
├── index.php                # Homepage
├── about-us.php             # About page
├── products.php             # Products listing (oil + dry tabs)
├── services.php             # Services listing
├── gallery.php              # Manufacturing videos
├── projects.php             # Projects overview + hero video
├── psi.php, ohe.php         # Project detail pages (Swiper galleries)
├── careers.php              # Careers + application form
├── contact-us.php           # Contact page + enquiry form
├── repairing.php, periodic-overhauling.php, transformer-erection.php
├── *-oil-filled.php         # 9 oil-filled product pages
├── *-dry-type.php           # 8 VPI dry-type product pages
├── robots.txt, sitemap.xml  # SEO
└── .htaccess                # Pretty URLs, caching, security headers
```

## Requirements

- PHP 7.4+ (mbstring enabled; `finfo` for resume MIME validation)
- Apache with `mod_rewrite`, `mod_headers`, `mod_expires`, `mod_deflate`, `mod_mime`
- Write access to `storage/logs/` and `uploads/resumes/`

## Setup

1. Copy `config/smtp.example.php` to `config/smtp.php` and enter real SMTP
   credentials (see "Email Configuration"). `config/smtp.php` is git-ignored.
2. Make sure `storage/logs/` and `uploads/resumes/` are writable by PHP.
3. Serve the project from an Apache vhost document root (the `.htaccess`
   handles pretty URLs, caching, compression and security headers).
4. Optional: set SMTP values via environment variables instead of the file
   (see `config/smtp.example.php` for the supported names).

## Docker (Quick Start)

The project is fully containerized (PHP 8.2 + Apache), mirroring the Project 2
setup. Anyone can clone the repository and run the site with a single command.

### Requirements

- Docker Desktop installed and running

### Build

```
docker compose build
```

### Run

```
docker compose up
```

### Stop

```
docker compose down
```

### Rebuild (after dependency/config changes)

```
docker compose up --build
```

The application will be available at: **http://localhost:8080**

Notes:

- The project directory is bind-mounted into the container, so code changes
  are reflected immediately during development.
- `storage/` and `uploads/` are named volumes: session files, email logs and
  uploaded resumes persist across container restarts and stay writable by Apache.
- Mail defaults to the `log` driver (writes to `storage/logs/email.log`), so the
  contact and careers forms work out of the box. To send real emails, pass SMTP
  environment variables — e.g. `MAIL_DRIVER=smtp SMTP_HOST=smtp.gmail.com
  SMTP_PORT=587 SMTP_USERNAME=... SMTP_PASSWORD=... docker compose up`.
- The container reports `healthy` once the homepage responds with HTTP 200
  (checked automatically every 30 seconds).

## Email Configuration

Emails are sent through `lib/Mailer.php` (PHPMailer). Settings are resolved in
this order: **environment variables → config/smtp.php → defaults**.

### Gmail (quick start)

1. Turn on **2-Step Verification** for the Google account that will send mail:
   https://myaccount.google.com/security
2. Create an **App Password**: https://myaccount.google.com/apppasswords
3. Open `config/smtp.php` (git-ignored) and fill in:
   - `username` and `from_email` — the Gmail address that sends
   - `password` — the 16-character App Password (Gmail rejects your normal login password)
   - `to_contact` / `to_careers` — the inbox(es) that should receive form messages
4. `driver` is already `smtp`, so messages are delivered for real.

To change the sending email, password or receiving inbox later, just edit
`config/smtp.php` again — no admin page needed.

### Environment variables (alternative)

| Variable          | Purpose                          |
|-------------------|----------------------------------|
| `SMTP_HOST`       | SMTP server, e.g. smtp.gmail.com |
| `SMTP_PORT`       | e.g. `587` (TLS) or `465` (SSL)  |
| `SMTP_USERNAME`   | SMTP login                       |
| `SMTP_PASSWORD`   | SMTP password                    |
| `SMTP_SECURE`     | `tls`, `ssl`, or empty           |
| `SMTP_FROM_EMAIL` | Sender address                   |
| `SMTP_FROM_NAME`  | Sender display name              |
| `SMTP_TO_CONTACT` | Contact-form recipient           |
| `SMTP_TO_CAREERS` | Careers-form recipient           |
| `MAIL_DRIVER`     | `smtp` (live) or `log` (dev)     |

With `MAIL_DRIVER=log`, emails are written to `storage/logs/email.log`
instead of being sent — use this for local testing only.

## Forms & Uploads

- Both forms are CSRF-protected and use a honeypot field for spam.
- Resumes are validated by extension, size (5 MB) and real MIME type, stored
  with random names in `uploads/resumes/`, which is blocked from direct web
  access via `.htaccess`, and attached to the email.
- Failed sends return a clear error to the user instead of silently succeeding.

## Customization

- Site-wide values (name, contacts, social links, statistics, limits) live in
  `includes/config.php`.
- Design variables (colors, fonts, spacing) are in `assets/css/base.css`.

## Browser Support

- Chrome 80+, Firefox 80+, Safari 14+, Edge 80+, and mobile browsers.
