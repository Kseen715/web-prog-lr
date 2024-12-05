# Base PHP stage
FROM php:8.2-zts-alpine AS base
WORKDIR /var/www
RUN apk add --no-cache libpng libzip libpng-dev libzip-dev git \
    && docker-php-ext-install pdo_mysql bcmath \
    && apk del libpng-dev libzip-dev

# Composer stage
FROM composer:2.7.6 AS composer
WORKDIR /var/www
COPY . .
RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel
RUN mkdir -p storage/framework/{sessions,views,cache} \
    && mkdir -p storage/logs \
    && chown -R laravel:laravel /var/www
USER laravel
RUN composer install --optimize-autoloader \
    && composer dump-autoload

# Node.js stage
FROM node:alpine AS node
WORKDIR /var/www
COPY package*.json ./
RUN npm ci
COPY . .
RUN npm run build

# Final stage
FROM base AS final
WORKDIR /var/www

# Copy artifacts and prepare directories
COPY --from=composer /var/www/vendor ./vendor
COPY --from=node /var/www/public/build ./public/build
COPY . .

RUN mkdir -p storage/framework/{sessions,views,cache} \
    && mkdir -p storage/logs \
    && mkdir -p bootstrap/cache \
    && addgroup -g 1000 laravel \
    && adduser -G laravel -g laravel -s /bin/sh -D laravel \
    && chown -R laravel:laravel /var/www \
    && chmod +x artisan

USER laravel
EXPOSE 9000

CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=9000