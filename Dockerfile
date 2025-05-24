# Use the official PHP 8.2 image as a base
FROM php:8.2-fpm

# Install necessary dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libmcrypt-dev zip git curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Set working directory in the container
WORKDIR /var/www/pos-system

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Expose port 9000 for PHP-FPM
EXPOSE 9000
