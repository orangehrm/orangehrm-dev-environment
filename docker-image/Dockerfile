FROM nginx:1.14

MAINTAINER orangehrm
LABEL authors = "OrangeHRM TechOps <techops@orangehrm.com>"


# Enable virtual hosts
COPY config/nginx.conf /etc/nginx/nginx.conf
COPY config/virtual-servers /etc/nginx/conf.d/virtual-servers
COPY config/cert /etc/nginx/cert
COPY config/ssl /etc/nginx/ssl

