FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    git unzip curl nodejs npm libpq-dev \
    && docker-php-ext-install pdo_pgsql

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . .


RUN npm install
RUN npm run build




RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8000
CMD php artisan serve --host=0.0.0.0 --port=8000
