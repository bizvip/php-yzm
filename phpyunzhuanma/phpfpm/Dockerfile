#FROM php:8.0.28-fpm-alpine3.16
#FROM php:8.1.16-fpm-alpine3.17
FROM php:8.2.3-fpm-alpine3.17

LABEL maintainer="archer"

#RUN apk update -y  \
#    && apk upgrade -y  \
#    && apk install -y git  \
#    && apk install -y libpq-dev libzip-dev zip zlib1g-dev libjpeg-dev libpng-dev  \
#    && rm -rf /var/lib/apt/lists/*

RUN apk update && apk add git

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions \
    && install-php-extensions pcntl \
    && install-php-extensions sockets \
    && install-php-extensions zip  \
    && install-php-extensions gd \
    && install-php-extensions igbinary \
    && install-php-extensions redis \
    && install-php-extensions opcache \
    && install-php-extensions bcmath \
    && install-php-extensions imagick \
    && install-php-extensions exif \
    && install-php-extensions pdo \
    && install-php-extensions pgsql \
    && install-php-extensions pdo_pgsql \
    && install-php-extensions pdo_mysql \
    && install-php-extensions simdjson

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
