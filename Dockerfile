FROM php:8.2-apache

# Install dependensi PHP dan SQLite
RUN apt-get update && apt-get install -y libsqlite3-dev unzip \
    && docker-php-ext-install pdo pdo_sqlite \
    && a2enmod rewrite

# Pindah ke folder web
WORKDIR /var/www/html

# Salin semua file dari GitHub ke server
COPY . .

# Install Composer dan dependensi Laravel
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Arahkan domain ke folder public Laravel
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Buat file database SQLite dan atur izin folder agar tidak error
RUN mkdir -p database && touch database/database.sqlite \
    && chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

EXPOSE 80
