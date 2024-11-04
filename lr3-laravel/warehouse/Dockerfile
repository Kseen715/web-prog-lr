FROM php:8.2-zts-alpine

COPY --from=composer:2.7.6 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

RUN apk update 
RUN apk add --no-cache git

COPY . .

RUN composer install --optimize-autoloader

RUN chmod +x artisan

EXPOSE 9000

RUN touch /usr/local/etc/php/php.ini 

RUN chown -R www-data:www-data /var/www/
USER www-data

# CMD ["ls", "-la", "/var/www/html"]

# CMD ["php","artisan","migrate"]

CMD php artisan serve --host=0.0.0.0 --port=9000