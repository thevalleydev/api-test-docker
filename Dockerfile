FROM composer:lts as build

COPY ./composer.json /app/

RUN bash -c "composer install"

FROM php:8.2-cli

COPY ./public /var/www/test-docker-php/public
COPY --from=build ./app/vendor /var/www/test-docker-php/vendor

WORKDIR /var/www/test-docker-php/public/

EXPOSE 3000

CMD ["php", "-S", "0.0.0.0:3000", "index.php"]
