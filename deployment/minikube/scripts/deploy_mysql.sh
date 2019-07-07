#!/bin/bash

# Apply secret
kubectl apply -f deployment/minikube/k8s/mysql_secret.yaml

# Apply persistent volume
kubectl apply -f deployment/minikube/k8s/mysql_pv_claim.yaml
# Apply deployment
kubectl apply -f deployment/minikube/k8s/mysql_deployment.yaml
# Apply service
kubectl apply -f deployment/minikube/k8s/mysql_external_service.yaml
