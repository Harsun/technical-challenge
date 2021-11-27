#!/bin/bash

REGISTRY='milamber'

REPO_ROOT=$(pwd)
#building frontend image
cd $REPO_ROOT/frontend


docker build -t $REGISTRY/react-frontend:latest .
docker push $REGISTRY/react-frontend:latest


#building backend image

cd $REPO_ROOT/backend

docker build -t $REGISTRY/php-backend:latest .
docker push $REGISTRY/php-backend:latest 

kubectl apply -f $REPO_ROOT/kubernetes/backend.yaml
kubectl apply -f $REPO_ROOT/kubernetes/backend-svc.yaml

kubectl apply -f $REPO_ROOT/kubernetes/frontend.yaml
kubectl apply -f $REPO_ROOT/kubernetes/frontend-svc.yaml
echo "waiting for stabilize"

sleep 60

echo "exposing services in your local." 

kubectl port-forward svc/frontend-svc 8000:8000 & kubectl port-forward svc/backend-svc 8080:8080
