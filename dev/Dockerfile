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
    php-mysql \
    && apt-get clean

# Enable necessary Apache module
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Expose port 80 for Apache
EXPOSE 80

# Start Apache in the foreground
CMD ["apachectl", "-D", "FOREGROUND"]
