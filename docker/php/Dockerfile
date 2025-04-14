FROM php:8.3-fpm

# Arguments defined in docker-compose.yml
ARG uid
ARG gid

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    libcurl3-dev curl \
    libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    libzip-dev zip \
    libgtk2.0-0 libgtk-3-0 libgbm-dev libnotify-dev libgconf-2-4 libnss3 libxss1 libasound2 libxtst6 xauth xvfb \
    zlib1g-dev libicu-dev g++ \
    nodejs npm

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

COPY php.ini /usr/local/etc/php/php.ini

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Create system user to run Composer and Artisan Commands
RUN groupadd --gid $gid laravel12_vue3_inertia_tailwind -f && \
    id -u $uid > /dev/null 2>&1 || useradd -G www-data --uid $uid --gid $gid -m laravel12_vue3_inertia_tailwind

# Clean up
RUN apt-get clean && \
    apt-get -y autoremove && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Set working directory
WORKDIR /var/www

USER laravel12_vue3_inertia_tailwind
