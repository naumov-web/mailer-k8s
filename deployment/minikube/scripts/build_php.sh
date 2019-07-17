#!/bin/bash

docker image build -t mailer-k8s:1.0 -f deployment/minikube/docker/php-fpm/Dockerfile . --force-rm
