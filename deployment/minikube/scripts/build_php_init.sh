#!/bin/bash

docker image build -t mailer-k8s-init:1.0 -f deployment/minikube/docker/php-fpm-init/Dockerfile . --force-rm
