# orangehrm-dev-environment

## Introduction
orangehrm-dev-environment is a dockerized development environment for OrangeHRM. Usually it will take hours to configure and prepare the development environment for orangehrm system. This project will save the developers time.

## Prerequisites
- Docker engine installed.([Get docker](https://docs.docker.com/engine/installation/))
- Disable ports 80 and 443 if they are used by localhost.
## How to use ?
Make sure mentioned prerequisites are there in your host machine.
1. clone the project anywhere you want  (`git clone https://github.com/orangehrm/orangehrm-dev-environment.git`)
2. open terminal and go to the cloned directory
3. run the command `docker-compose up -d`
4. run `docker ps` and make sure all the containers are up and running.

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
>Example - How to change port 80 to 8080. Replace the line `"80:80"` by `"8080:80"`. By doing that developer no need to disable the localhost ports. If you want to change any default apache or php configurations you can fins them under _/config_ folder.

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