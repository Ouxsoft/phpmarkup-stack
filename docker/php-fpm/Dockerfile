FROM php:7.4-fpm-buster

ARG ENV=DEV
ARG user=root
ARG group=root

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
  git \
  bash \
  && apt-get clean

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

## install opcache
RUN docker-php-source extract \
  pecl install opcache apcu \
  docker-php-ext-enable opcache apcu \
  docker-php-source delete \
  rm -rf /tmp/*

# run envionmental specific commands
COPY install.sh install.sh
RUN chmod u+x install.sh
RUN ["/bin/bash", "-c", "./install.sh"]

# allow webserver to to use modify application
RUN chown -R $group:$user /application/

USER $user

#ENTRYPOINT ["/bin/bash"]