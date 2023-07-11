# Use the official PHP base image
FROM php:8.2.8-cli

# Set the working directory in the container
WORKDIR /app

# Copy the project files to the container
COPY . /app

# Install Xdebug extension
RUN pecl install xdebug && \
    docker-php-ext-enable xdebug

# Install Composer
RUN apt-get update && apt-get install -y zip unzip
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install project dependencies
RUN composer install --no-dev --optimize-autoloader

# Configure Xdebug
RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Define the command to run your PHP script
CMD ["php", "index.php"]
