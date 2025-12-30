FROM php:8.2-cli

# Dépendances système
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git curl npm \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql zip

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# App
WORKDIR /var/www
COPY . .

# Dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# Front (Inertia / Vue)
RUN npm install
RUN npm run build

# Permissions Laravel
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000
