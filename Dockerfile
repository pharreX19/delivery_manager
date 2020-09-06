FROM php:7.3-fpm

LABEL author="Mohamed Farraz"

COPY composer.json /var/www/

WORKDIR /var/www

RUN apt-get update && apt-get install -y curl git unzip zip vim libzip-dev

RUN apt-get clean && rm -rf /var/lib/apt/list/*

RUN apt-get install -y libpng-dev libjpeg-dev 

RUN docker-php-ext-install gd

RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY . /var/www
COPY --chown=www:www . /var/www

USER www

EXPOSE 9000
CMD ["php-fpm"]
