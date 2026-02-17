#!/bin/bash

# Ajustar permisos
chown -R www-data:www-data /var/www/storage
chown -R www-data:www-data /var/www/bootstrap/cache
chmod -R 775 /var/www/storage
chmod -R 775 /var/www/bootstrap/cache

# Esperar a que la DB esté disponible
until php -r "new PDO('mysql:host=db;port=3306;dbname=laravel', 'root', '1234');" > /dev/null 2>&1; do
  echo "Waiting for database connection..."
  sleep 2
done

# Ejecutar migraciones
php artisan migrate --force

# Iniciar PHP-FPM
exec "$@"