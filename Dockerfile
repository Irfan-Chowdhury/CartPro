# Use PHP 8.1 Apache image
FROM php:8.1-apache

# Set working directory
WORKDIR /var/www/html

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install required system dependencies
RUN apt-get update -y && apt-get install -y \
    libicu-dev \
    libmariadb-dev-compat \
    unzip zip \
    zlib1g-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install required PHP extensions
RUN docker-php-ext-install gettext intl pdo_mysql gd

# Fix GD installation by using correct options
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

