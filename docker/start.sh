#!/bin/sh

# Wait for services to be ready (if needed)
# This is a placeholder for any service dependencies

# Ensure database directory exists and is writable
mkdir -p /var/www/html/database || true
chown -R www-data:www-data /var/www/html/database || true
chmod -R 775 /var/www/html/database || true

# Create SQLite database file if it doesn't exist
if [ ! -f /var/www/html/database/database.sqlite ]; then
    touch /var/www/html/database/database.sqlite || true
    chown www-data:www-data /var/www/html/database/database.sqlite || true
    chmod 664 /var/www/html/database/database.sqlite || true
fi

# Clear and cache configuration (ignore errors)
php artisan config:clear || true
php artisan cache:clear || true
php artisan view:clear || true

# Run database migrations (ignore errors - migrations may have already run)
php artisan migrate --force || true

# Optimize Laravel (ignore errors - optimization may fail if config is invalid)
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Start supervisor (which manages nginx and php-fpm)
# This must succeed, so no error handling here
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
