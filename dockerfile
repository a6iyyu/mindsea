FROM php:8.3-cli
RUN apt-get update && apt-get install -y \
    libssl-dev \
    libcurl4-openssl-dev \
    unzip \
    git \
    && docker-php-ext-install bcmath
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /app
COPY . .
RUN composer install --no-dev --optimize-autoloader
RUN chmod -R 775 /app/bootstrap/cache /app/storage
EXPOSE 8080
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]