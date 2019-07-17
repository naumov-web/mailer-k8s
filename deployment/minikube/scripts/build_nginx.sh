#!/bin/bash

docker image build -t mailer-k8s-nginx:1.0 -f deployment/minikube/docker/nginx/Dockerfile . --force-rm
