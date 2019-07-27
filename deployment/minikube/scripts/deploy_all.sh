#!/bin/bash

echo "Deploy all entities!"
echo "Delete all existing entities from K8S!"
kubectl delete -f deployment/minikube/k8s/mysql_deployment.yaml
kubectl delete -f deployment/minikube/k8s/app_deployment.yaml
kubectl delete -f deployment/minikube/k8s/nginx_deployment.yaml

echo "Build containers!"
./deployment/minikube/scripts/build_php.sh
./deployment/minikube/scripts/build_php_init.sh
./deployment/minikube/scripts/buind_nginx.sh

echo "Apply all entities!"
kubectl apply -f deployment/minikube/k8s/mysql_secret.yaml
kubectl apply -f deployment/minikube/k8s/mysql_pv_claim.yaml
kubectl apply -f deployment/minikube/k8s/mysql_deployment.yaml
kubectl apply -f deployment/minikube/k8s/mysql_external_service.yaml

kubectl apply -f deployment/minikube/k8s/redis_config_map.yaml

kubectl apply -f deployment/minikube/k8s/app_secret.yaml
kubectl apply -f deployment/minikube/k8s/app_deployment.yaml
kubectl apply -f deployment/minikube/k8s/app_service.yaml

kubectl apply -f deployment/minikube/k8s/nginx_deployment.yaml
kubectl apply -f deployment/minikube/k8s/nginx_service.yaml
