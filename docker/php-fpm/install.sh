# Dockerfile installation script for running environmental specific commands

# create php.ini
if [ "$ENV" = "PROD" ]; then
  mv $PHP_INI_DIR/php.ini-production $PHP_INI_DIR/php.ini
else
  mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini
fi

# install xdebug on dev only
if [ "$ENV" = "DEV" ]; then
  pecl install xdebug
  echo "xdebug.mode=debug\n" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
  echo "xdebug.start_with_request=yes\n" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
  echo "xdebug.remote_port=9000\n" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
  echo "xdebug.remote_handler=dbgp\n" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
  echo "xdebug.remote_connect_back=1\n" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
  docker-php-ext-enable xdebug
  docker-php-source delete
  rm -rf /tmp/*
fi

# install composer
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

