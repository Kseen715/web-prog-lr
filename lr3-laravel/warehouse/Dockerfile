FROM php:8.2-zts-alpine

COPY --from=composer:2.7.6 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

RUN apk update 
RUN apk add --no-cache \
    libpng-dev \
    libzip-dev zip unzip \
    jpegoptim optipng pngquant gifsicle \
    vim curl git \
    npm


# git npm libzip-dev zip unzip

RUN docker-php-ext-install pdo_mysql

COPY . .

RUN npm install && npm run build

RUN composer install --optimize-autoloader --no-dev

RUN chmod +x artisan

EXPOSE 9000

RUN touch /usr/local/etc/php/php.ini 

RUN php artisan storage:link

RUN chown -R www-data:www-data /var/www/
USER www-data

CMD php artisan migrate -q && php artisan serve --host=0.0.0.0 --port=9000