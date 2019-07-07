FROM php:7.2-fpm

# Configure services
RUN apt-get update && apt-get install -y nginx supervisor
COPY deployment/minikube/configs/supervisor.conf /etc/supervisor/conf.d/supervisor.conf
ADD deployment/minikube/configs/nginx.conf /etc/nginx/sites-enabled/default.conf
RUN rm /etc/nginx/sites-enabled/default
RUN /etc/init.d/nginx stop

# Install libraries
RUN apt-get update && apt-get install --assume-yes zlib1g-dev
RUN docker-php-ext-install pdo pdo_mysql zip

# Open port
EXPOSE 7000

# Install vendor
COPY ./composer.json ./composer.lock /var/www/
RUN curl -sL https://getcomposer.org/installer | php -- --install-dir /usr/bin --filename composer
RUN cd /var/www && composer install --working-dir=/var/www --no-scripts --no-autoloader

COPY . /var/www
RUN cd /var/www \
    && cp .env.minikube .env \
    && composer dump-autoload

RUN mkdir -p /var/www/storage/framework/cache \
    && mkdir -p /var/www/storage/framework/views \
    && mkdir -p /var/www/storage/logs
RUN chown -R www-data:www-data /var/www/storage

CMD ["/usr/bin/supervisord", "-n"]
