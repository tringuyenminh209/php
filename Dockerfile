FROM php:8.4-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Configure Apache to allow directory access
RUN echo "<Directory /var/www/html>\n    Options Indexes FollowSymLinks\n    AllowOverride All\n    Require all granted\n</Directory>" >> /etc/apache2/apache2.conf

# Set working directory
WORKDIR /var/www/html

# Copy existing application directory permissions
RUN chown -R www-data:www-data /var/www/html

# Expose port 80
EXPOSE 80