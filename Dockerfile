FROM php:8.4-cli

# Dépendances système
RUN apt-get update && apt-get install -y \
    git unzip curl nodejs npm libpq-dev \
    && docker-php-ext-install pdo_pgsql

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copier les fichiers de dépendances d'abord (optimisation du cache Docker)
COPY package*.json ./
RUN npm install

# Copier le reste du projet
COPY . .

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Générer les assets de production (C'est ici que le manifest est créé)
RUN npm run build

# FIX : S'assurer que les permissions sont correctes APRES le build
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache /var/www/public

EXPOSE 8000
CMD php artisan serve --host=0.0.0.0 --port=$PORT