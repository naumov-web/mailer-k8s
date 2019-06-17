#!/bin/bash

set -e

echo "Starting minikube ..."
minikube start

echo "Configure docker client"
eval $(minikube docker-env)
