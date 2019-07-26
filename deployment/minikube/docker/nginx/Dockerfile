FROM nginx

COPY ./deployment/minikube/configs/nginx.conf /etc/nginx/conf.d/mailer.conf
RUN rm -f /etc/nginx/conf.d/default.conf
COPY ./ /var/www
