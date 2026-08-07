#!/bin/sh
# Nani Transformers - container entrypoint.
# 1. Picks the port Apache listens on ($PORT, default 80).
# 2. Ensures the writable runtime directories exist.
# 3. Fixes ownership so www-data (Apache) can write.
# 4. Starts Apache in the foreground.
set -e

# Default port
export PORT="${PORT:-80}"

# Make $PORT visible to Apache's envvars (used by ports.conf / vhost)
if ! grep -q "^export PORT=" /etc/apache2/envvars 2>/dev/null; then
    echo "export PORT=${PORT}" >> /etc/apache2/envvars
fi

# Ensure writable runtime directories exist
mkdir -p /var/www/html/storage/sessions \
         /var/www/html/storage/logs \
         /var/www/html/uploads/resumes

# Fix ownership (important for bind-mounted or volume directories)
chown -R www-data:www-data /var/www/html/storage /var/www/html/uploads

# Start Apache in the foreground
exec apache2-foreground
