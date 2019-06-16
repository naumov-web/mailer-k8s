FROM php:7.2-fpm

COPY . /var/www

WORKDIR /var/www

RUN apt-get update && apt-get install --assume-yes zlib1g-dev

RUN docker-php-ext-install pdo pdo_mysql zip

RUN apt-get --assume-yes install supervisor
RUN apt-get install unzip

COPY deployment/local/configs/supervisord_queue_worker.conf /etc/supervisord.conf

RUN /etc/init.d/supervisor stop

RUN curl -sL https://getcomposer.org/installer | php -- --install-dir /usr/bin --filename composer

CMD supervisord -c /etc/supervisord.conf
