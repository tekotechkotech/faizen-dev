FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev libxml2-dev libicu-dev \
    && docker-php-ext-install pdo_mysql zip intl \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . .
RUN composer install --no-interaction --prefer-dist --no-dev -o || composer install --no-interaction --prefer-dist -o

EXPOSE 8010
CMD ["php", "-d", "expose_php=0", "artisan", "serve", "--host=0.0.0.0", "--port=8010"]
