# Use slim Debian image with Apache
FROM debian:bullseye-slim

# Install PHP, Apache, and necessary extensions
RUN apt-get update && apt-get install -y \
    apache2 \
    libapache2-mod-php \
    php-cli \
    php-mbstring \
    php-xml \
    php-zip \
    php-intl \
    php-pdo \
    php-sqlite3 \
    php-mysql \
    curl \
    gnupg \
    vim \
    && apt-get clean

# Enable necessary Apache module
RUN a2enmod rewrite

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# Install Node.js and npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Add ll alias for ls -lah
RUN echo "alias ll='ls -lah'" >> /etc/bash.bashrc

# Set working directory
WORKDIR /var/www/html

# Expose port 80 for Apache
EXPOSE 80

# Start Apache in the foreground
CMD ["apachectl", "-D", "FOREGROUND"]
