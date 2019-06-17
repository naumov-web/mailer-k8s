#!/bin/bash

docker build -t naumov-web/mailer-k8s:latest -f deployment/minikube/docker/nginx-php/Dockerfile . --force-rm
