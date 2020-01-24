FROM php:7.3-fpm

WORKDIR "/application"

#RUN echo 'TESTE APTITUDEsdds'

RUN apt-get update --fix-missing \
    && apt-get install -y apt-utils \
    && apt-get install -y libcurl4-gnutls-dev \
    && apt-get install -y libxml2-dev \
    && apt-get install -y freetds-dev \
    && apt-get install -y git \
    && apt-get install -y curl \
    && apt-get install -y supervisor \
    && apt-get install -y libpq-dev \
    && apt-get install -y zip \
    && docker-php-ext-install calendar \
    && docker-php-ext-install pdo mysqli pdo_mysql

WORKDIR "/tmp"

RUN ls -la /tmp \
    && curl --silent --show-error https://getcomposer.org/installer | php \
    && ls -la /tmp/composer.phar \
    && mv /tmp/composer.phar /usr/local/bin/ \
    && ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

WORKDIR "/application"

COPY . /application
COPY ./docker/php-fpm/docker-entrypoint.sh /usr/local/bin/
ENTRYPOINT ["docker-entrypoint.sh"]

RUN chmod 777 /usr/local/bin/docker-entrypoint.sh \
    && ln -s /usr/local/bin/docker-entrypoint.sh /

RUN chmod 777 -R storage/

RUN chmod 777 -R bootstrap/cache/

RUN docker-php-ext-install bcmath \
    && docker-php-ext-enable bcmath \