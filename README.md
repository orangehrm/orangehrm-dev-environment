# orangehrm-dev-environment
[![Build Status](https://travis-ci.org/orangehrm/orangehrm-dev-environment.svg?branch=master)](https://travis-ci.org/orangehrm/orangehrm-dev-environment)
## Introduction
orangehrm-dev-environment is a dockerized development environment for OrangeHRM. Usually it will take hours to configure and prepare the development environment for orangehrm system. This project will save the developers time.

This environment will depends on containers of [orangehrm-dev-image](https://hub.docker.com/r/orangehrm/orangehrm-dev-image/),[mysql](https://hub.docker.com/_/mysql/) and [phpmyadmin](https://hub.docker.com/r/phpmyadmin/phpmyadmin/).
## Prerequisites
- Docker engine installed.([Get docker](https://docs.docker.com/engine/installation/))
- Minimum docker version 1.12
- Minimum docker-compose vsersion 1.9 
- Disable ports 80 and 443 if they are used by localhost.

## How to use ?
Make sure mentioned prerequisites are there in your host machine.

1. go to release tab and download the latest release.
2. open terminal and go to the cloned directory
3. run the command `docker-compose up -d`
4. run `docker ps` and make sure all the containers are up and running.
5. Your web root will be _/ohrm_dev_ directory and make sure to put your project in that folder. 

**Note** : [Vedio Tutorial](https://www.youtube.com/watch?v=fURFe-tARyk)

## Install orangehrm eagle-core inside the container
1. get a checkout from svn to ohrm_dev directory (`svn checkout https://repos.orangehrm.com/enterprise/branch/eagle-core/`).
2. to make a virtual host add the project folder name to /etc/hosts file (`127.0.0.1 folderName`).
3. access from your browser (`https://folderName`). If you have changed the default port configuration in dev_web container then you can access using `htttps://folderName:portNumber`
4. Continue installation by installing system as normal way. (you can have access to inside of dev_web container by running the command `docker exec -it dev_web bash`)

## Default configurations
Developer can change the default configurations if they want by simply changing the docker-compose file.It is better to have a some knowledge on docker-compose file. ([docker-compose file reference](https://docs.docker.com/compose/compose-file/))
### 1 Default configurations in dev_web container
```
ports:
    - "80:80"
    - "443:443"
volumes:
    - ./ohrm_dev:/var/www/html
    - ./config/php5/apache2:/etc/php5/apache2
    - ./config/php5/cli:/etc/php5/cli
    - ./config/mysql-client:/etc/mysql
    - ./config/apache2:/etc/apache2
    - ./logs/ubuntu_logs:/var/log
```
>Example - How to change port 80 to 8080. Replace the line `"80:80"` by `"8080:80"`. By doing that developer no need to disable the localhost ports. If you want to change any default apache or php configurations you can find them under _/config_ folder.

### 2 Default configurations in dev_mysql container
```
expose:
    - "3306"
volumes:
    - ./config/mysql-server:/etc/mysql
    - ./logs/mysql_logs:/var/log
environment:
    MYSQL_ROOT_PASSWORD: 1234
```
You can change exposed port as mentioned in dev_web container configurations. For more information about this container refer into [mysql official image](https://hub.docker.com/_/mysql/).
### 3 Default configurations in dev_phpmyadmin container
```
volumes:
    - ./logs/phpmyadmin_logs:/var/log
links:
    - db
ports:
    - "9090:80"
environment:
    PMA_HOST: db
```
More about phpmyadmin container can find in docker hub [phpmyadmin image](https://hub.docker.com/r/phpmyadmin/phpmyadmin/)

### Additional information
1. Can have access to inside of any containers by running `docker exec -it <containerID or ContainerName> /bin/bash`
2. Can restart containers using `docker-compose restart`
3. Can stop containers using `docker-compose stop`
2. Developer can find log files for each container from _/logs_ directory. ( Also possible to get logs of containers by running the command `docker logs <container ID>`)
3. Developer can find configurations for apache, php, mysql-client, mysql-server, etc from _/config directory.
