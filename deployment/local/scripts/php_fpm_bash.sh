#!/bin/bash

echo -e "\e[32mConnecting to php-fpm container!"
echo -e "\e[97m"

CONTAINER_ID=`docker ps -qf "name=mailer_k8s_api_php_fpm"`

if [[ -z "$CONTAINER_ID" ]]; then
    echo -e "\e[31mContainer not found in running containers!"
    echo -e "\e[97m"
    exit
fi

docker exec -it $CONTAINER_ID /bin/bash
