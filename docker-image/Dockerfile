FROM nginx:1.14

MAINTAINER orangehrm
LABEL authors = "OrangeHRM TechOps <techops@orangehrm.com>"


# Enable virtual hosts
COPY config/nginx.conf /etc/nginx/nginx.conf
COPY config/virtual-servers /etc/nginx/conf.d/virtual-servers
COPY config/cert /etc/nginx/cert
COPY config/ssl /etc/nginx/ssl

COPY logs/web56 /var/log/nginx/web56
COPY logs/web70 /var/log/nginx/web70
COPY logs/web71 /var/log/nginx/web71
COPY logs/web72 /var/log/nginx/web72
COPY logs/phpmyadmin /var/log/nginx/phpmyadmin
COPY logs/webubuntu71 /var/log/nginx/webubuntu71