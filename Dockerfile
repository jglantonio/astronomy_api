
FROM php:8.2-apache
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
COPY php.ini /usr/local/etc/php/php.ini
RUN apt-get update
RUN apt-get install libonig-dev -y
RUN apt-get install libzip-dev -y
RUN apt-get install libbz2-dev -y
RUN apt-get install -y libpng-dev
RUN docker-php-ext-install gd
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install pdo
RUN docker-php-ext-install bz2
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install zip
RUN docker-php-ext-install mysqli

EXPOSE 80