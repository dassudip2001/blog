FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    curl \
    libonig-dev \
    libzip-dev \
    unzip \
    zip

RUN docker-php-ext-install pdo_mysql && \
    docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www

COPY . .

RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=8000


FROM node:14-alpine as node

WORKDIR /var/www
COPY . .

RUN npm install

CMD npm run dev

