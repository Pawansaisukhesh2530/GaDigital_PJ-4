# Nani Transformers - Static PHP Website

A clean, fast, and maintainable PHP rebuild of nanitransformers.com — without WordPress.

## Project Structure

```
project/
├── assets/
│   ├── css/
│   │   ├── base.css          # Variables, reset, typography
│   │   ├── layout.css        # Container, grid, sections
│   │   ├── header.css        # Top bar, navigation, mobile menu
│   │   ├── footer.css        # Footer, WhatsApp float, scroll-to-top
│   │   ├── components.css    # Cards, features, counters, carousel
│   │   ├── buttons.css       # All button styles
│   │   ├── forms.css         # Form elements and validation
│   │   ├── animations.css    # Scroll animations, transitions
│   │   ├── responsive.css    # All breakpoints
│   │   └── lightbox.css      # Gallery lightbox
│   ├── js/
│   │   └── main.js           # All vanilla JavaScript
│   ├── images/
│   │   ├── clients/          # Client logos (logo-1.jpg to logo-8.jpg)
│   │   ├── products/         # Product images
│   │   ├── gallery/          # Gallery images (gallery-1.jpg to gallery-12.jpg)
│   │   ├── services/         # Service images
│   │   ├── logo.png          # Company logo
│   │   ├── hero-transformer.jpg
│   │   ├── about-home.jpg
│   │   └── about-main.jpg
│   ├── icons/
│   └── fonts/
├── includes/
│   ├── config.php            # Site configuration
│   ├── head.php              # HTML head, meta tags, CSS links
│   ├── header.php            # Top bar + main navigation
│   ├── footer.php            # Footer + floating buttons
│   ├── scripts.php           # JS includes + closing tags
│   ├── clients-section.php   # Reusable clients carousel
│   ├── product-detail-template.php
│   └── service-detail-template.php
├── handlers/
│   ├── contact-form.php      # Contact form processing
│   └── career-form.php       # Career form processing
├── index.php                 # Homepage
├── about-us.php              # About page
├── products.php              # Products listing
├── gallery.php               # Photo gallery
├── careers.php               # Careers + application form
├── contact-us.php            # Contact page
├── repairing.php             # Service: Repairing
├── periodic-overhauling.php  # Service: Periodic Overhauling
├── transformer-erection.php  # Service: Transformer Erection
├── distribution-transformers-oil-filled.php
├── power-transformers-oil-filled.php
├── inverter-duty-transformers-oil-filled.php
├── converter-duty-transformers-oil-filled.php
├── furnace-duty-transformers-oil-filled.php
├── rectifier-transformers-oil-filled.php
├── isolation-transformers-oil-filled.php
├── lightning-transformers-oil-filled.php
├── generator-transformers-oil-filled.php
├── .htaccess                 # URL rewriting, caching, security
└── README.md
```

## Setup

1. Place files on any PHP-enabled web server (Apache with mod_rewrite recommended)
2. Download images from the live site and place in the appropriate directories
3. Update `includes/config.php` if any contact details change

## Image Sources

Download the following from the live WordPress site:

### Logo
- `assets/images/logo.png` — from site header

### Client Logos
From `https://nanitransformers.com/wp-content/uploads/2025/11/`
- Logo-27.jpg through Logo-31.jpg → save as `assets/images/clients/logo-1.jpg` etc.

### Product Images
From `https://nanitransformers.com/wp-content/uploads/2025/`
- Distribution Transformers image
- Power Transformers image
- Converter Duty Transformer images
- Lightning Transformer image (Auxiliary-_-Lightning-Transformer-1.jpg)
- Etc.

### Service Images
- Transformer-Erection-1.jpg, Transformer-Erection-2.jpg

### Gallery Images
Download all gallery images and save as `gallery-1.jpg` through `gallery-12.jpg`

## Features

- **No WordPress** — pure PHP with reusable includes
- **Fast loading** — optimized CSS/JS, no heavy frameworks
- **Responsive** — works on all devices (mobile, tablet, desktop)
- **Accessible** — semantic HTML, ARIA labels, keyboard navigation
- **SEO-friendly** — proper meta tags, heading hierarchy, alt text
- **Animated** — scroll-triggered animations, counters, carousel
- **Interactive** — mobile menu, gallery lightbox, form validation
- **Cached** — .htaccess rules for browser caching and compression
- **Secure** — form sanitization, security headers, file protection

## Browser Support

- Chrome 80+
- Firefox 80+
- Safari 14+
- Edge 80+
- Mobile browsers (iOS Safari, Chrome Android)

## Customization

All design variables are in `assets/css/base.css`:
- Colors (primary, secondary, accent)
- Typography (font sizes, weights)
- Spacing scale
- Border radius
- Shadows
- Transitions
