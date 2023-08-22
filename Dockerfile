FROM php:8.2-cli

RUN apt-get update -y && apt-get install -y libmcrypt-dev libpq-dev git zip unzip libzip-dev

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN curl -sS https://get.symfony.com/cli/installer | bash -s - --install-dir=/usr/local/bin
RUN docker-php-ext-install pdo pdo_pgsql opcache zip
RUN pecl install redis && docker-php-ext-enable redis

WORKDIR /app
COPY . /app

RUN composer install
RUN symfony check:requirements
RUN symfony server:prod

EXPOSE 8000
CMD ./startup.sh