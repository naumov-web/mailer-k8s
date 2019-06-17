FROM php:7.2-fpm

RUN apt-get update && apt-get install -y nginx supervisor

COPY . /var/www

COPY deployment/minikube/configs/supervisor.conf /etc/supervisor/conf.d/supervisor.conf

ADD deployment/minikube/configs/nginx.conf /etc/nginx/sites-enabled/default.conf
RUN rm /etc/nginx/sites-enabled/default

RUN /etc/init.d/nginx stop
EXPOSE 7000

CMD ["/usr/bin/supervisord", "-n"]
