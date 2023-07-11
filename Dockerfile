# Use the official PHP base image
FROM php:8.2.8-cli

# Set the working directory in the container
WORKDIR /app

# Copy the project files to the container
COPY . /app

# Install Composer
RUN apt-get update && apt-get install -y zip unzip
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install project dependencies
RUN composer install --no-dev --optimize-autoloader

CMD ["php", "index.php"]
