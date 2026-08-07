# ============================================================
# Nani Transformers - Project 4 Dockerfile
# PHP 8.2 + Apache
# Mirrors the Project 2 (nivi-homes) container pattern.
# ============================================================
FROM php:8.2-apache

# Install PHP extensions actually required by this project:
# - fileinfo : resume MIME validation (handlers/career-form.php)
# - mbstring : mb_strlen/mb_substr used by forms and page metadata
# - ca-certificates / openssl : TLS verification for SMTP (PHPMailer)
#   (the openssl PHP extension itself ships compiled into the base image)
RUN apt-get update && apt-get install -y --no-install-recommends \
        libonig-dev \
        ca-certificates \
        openssl \
    && docker-php-ext-install fileinfo mbstring \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache modules used by the project's .htaccess:
# - rewrite : extensionless pretty URLs
# - headers : security headers (X-Frame-Options, etc.)
# - expires : cache static assets for a year
# - deflate : gzip-compress HTML/CSS/JS
RUN a2enmod rewrite headers expires deflate mime

# PHP production config: log errors, never display them to the browser
RUN { \
        echo 'display_errors = Off'; \
        echo 'log_errors = On'; \
        echo 'error_log = /dev/stderr'; \
        echo 'error_reporting = E_ALL & ~E_DEPRECATED & ~E_STRICT'; \
    } > /usr/local/etc/php/conf.d/production.ini

# Allow .htaccess overrides so the project's rewrite/security rules apply
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf \
    && echo 'ServerName localhost' >> /etc/apache2/apache2.conf

# Apache listens on $PORT (default 80). docker-compose maps host 8080 -> 80.
COPY docker/ports.conf /etc/apache2/ports.conf
COPY docker/apache-port.conf /etc/apache2/sites-available/000-default.conf

# Entrypoint + health check scripts
COPY docker/start.sh /usr/local/bin/start.sh
COPY docker/healthcheck.sh /usr/local/bin/healthcheck.sh
RUN chmod +x /usr/local/bin/start.sh /usr/local/bin/healthcheck.sh

# Copy the application into the webroot
COPY . /var/www/html/

# Remove the docker config folder from the webroot (not needed at runtime)
RUN rm -rf /var/www/html/docker

# Writable runtime directories (sessions, email logs, resume uploads).
# Composes overrides these with named volumes so they stay writable and
# persist across container restarts.
RUN mkdir -p /var/www/html/storage/sessions \
             /var/www/html/storage/logs \
             /var/www/html/uploads/resumes \
    && chown -R www-data:www-data /var/www/html/storage \
                                  /var/www/html/uploads \
    && chmod -R 775 /var/www/html/storage \
                    /var/www/html/uploads

# Simple health check so Docker can report container health.
# Uses the bundled PHP binary (no extra packages needed).
HEALTHCHECK --interval=30s --timeout=5s --start-period=15s --retries=3 \
    CMD ["/usr/local/bin/healthcheck.sh"]

ENV PORT=80
EXPOSE 80

CMD ["/usr/local/bin/start.sh"]
