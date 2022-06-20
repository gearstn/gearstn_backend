# FROM php:7.4-fpm

# # RUN apt-get update -y && apt-get install -y libmcrypt-dev openssl
# # RUN docker-php-ext-install pdo mcrypt mbstring

# WORKDIR /app
# COPY . /app

# RUN composer install
# CMD php artisan serve --host=0.0.0.0 --port=8000
# EXPOSE 8000

FROM php:7.4-fpm

LABEL maintainer="Gbenga Oni B. <onigbenga@yahoo.ca>" \
      version="1.0"

COPY --chown=www-data:www-data . /srv/app

# COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /srv/app

# RUN docker-php-ext-install mbstring pdo pdo_mysql \
#     && a2enmod rewrite negotiation \
#     && docker-php-ext-install opcache
