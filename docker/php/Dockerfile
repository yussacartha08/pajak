FROM php:7.2.12-fpm

# Install modules
RUN buildDeps="libpq-dev libzip-dev " \
    && apt-get update && apt-get install -y $buildDeps --no-install-recommends \
    && docker-php-ext-install pdo_pgsql pgsql

RUN curl -sSL https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && apt-get install -y zlib1g-dev git wget \
    && docker-php-ext-install zip \
    && rm -rf /var/lib/apt/lists/*

CMD ["php-fpm"]
