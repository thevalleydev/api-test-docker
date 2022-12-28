FROM php:8.2-cli

COPY . /var/www/test-docker-php
WORKDIR /var/www/test-docker-php/public/

CMD ["php", "-S", "0.0.0.0:3000", "index.php"]
