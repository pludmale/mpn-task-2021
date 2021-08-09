FROM php:8.0.9-fpm

RUN apt-get update -y \
  && apt-get install -y nginx \
  && apt-get install -y git

# PHP_CPPFLAGS are used by the docker-php-ext-* scripts
ENV PHP_CPPFLAGS="$PHP_CPPFLAGS -std=c++11"

RUN docker-php-ext-install pdo_mysql \
    && docker-php-ext-install opcache \
    && apt-get install libicu-dev -y \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && apt-get remove libicu-dev icu-devtools -y

RUN { \
        echo 'opcache.memory_consumption=128'; \
        echo 'opcache.interned_strings_buffer=8'; \
        echo 'opcache.max_accelerated_files=4000'; \
        echo 'opcache.revalidate_freq=2'; \
        echo 'opcache.fast_shutdown=1'; \
        echo 'opcache.enable_cli=1'; \
    } > /usr/local/etc/php/conf.d/php-opocache-cfg.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY infra/default-nginx.conf /etc/nginx/sites-enabled/default
COPY infra/entrypoint.sh /etc/entrypoint.sh

COPY --chown=www-data:www-data app /var/www/html

WORKDIR /var/www/html

EXPOSE 80 443

ENTRYPOINT ["sh", "/etc/entrypoint.sh"]
