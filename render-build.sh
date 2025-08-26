#!/usr/bin/env bash

# Exit on error
set -o errexit

# Install dependencies
composer install --no-dev --optimize-autoloader

# Generate app key if not set
if [ -z "$(grep APP_KEY=base64 .env)" ]; then
    php artisan key:generate --show
fi

# Run database migrations
php artisan migrate --force

# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Optimize application
php artisan optimize

# Install node dependencies and build assets (if needed)
# npm install
# npm run build