#!/bin/bash
set -e

echo "[ ****************** ] Starting Endpoint of Application [ ****************** ]"

echo "Back - Starting Endpoint of Application"
if ! [ -d "./vendor" ]; then
    echo " Install depedences whit composer..."
    composer install --ignore-platform-reqs  --no-interaction --verbose --no-suggest
    echo "DB Migration"
    php artisan module:migrate:refresh --seed
fi

chmod 777 -R storage/
chmod 777 -R bootstrap/cache/

exec "$@"

set -- php-fpm

exec "$@"
