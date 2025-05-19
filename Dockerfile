FROM php:8.1-apache

# Cài extension PHP và công cụ cần thiết
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip \
    libzip-dev zip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy source code
COPY . /var/www/html

# Set working dir
WORKDIR /var/www/html

# Phân quyền
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Apache config
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN a2enmod rewrite

# Laravel commands
RUN composer install --no-dev --optimize-autoloader
RUN php artisan config:clear && php artisan cache:clear && php artisan view:clear

# Laravel storage symlink
RUN php artisan storage:link || true

EXPOSE 80
