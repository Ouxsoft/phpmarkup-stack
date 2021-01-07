FROM php:7.4-fpm-buster

ARG user=root
ARG group=root

# use the default production configuration
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

WORKDIR "/application"

# fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update && \
    apt-get install -y \
    wget \
    gnupg \
    g++ \
    locales \
    unzip \
    dialog \
    apt-utils \
    curl \
    git && \
    apt-get clean

# libpng-dev needed by "gd" extension
# libzip-dev needed by "zip" extension
# libicu-dev for intl extension
RUN apt-get update && \
    apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libicu-dev \
    vim && \
    apt-get clean

RUN docker-php-ext-configure gd --with-freetype --with-jpeg

# install necessary tools for running application
RUN docker-php-ext-install \
    gd \
    intl \
    opcache \
    zip

# set UTC server time
RUN echo "UTC" > /etc/timezone && \
    dpkg-reconfigure -f noninteractive tzdata

## install opcache, xdebug
## WARNING disable XDBUG on prod
RUN docker-php-source extract \
    && pecl install opcache xdebug apcu \
    && echo "xdebug.remote_enable=on\n" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_autostart=on\n" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_port=9000\n" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_handler=dbgp\n" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_connect_back=1\n" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && docker-php-ext-enable opcache xdebug apcu \
    && docker-php-source delete \
    && rm -rf /tmp/*

# allow webserver to to use modify application
RUN chown -R $group:$user /application/

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


USER $user

#ENTRYPOINT ["/bin/bash"]