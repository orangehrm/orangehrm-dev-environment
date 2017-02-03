FROM orangehrm/orangehrm-environment-images:prod-5.5

MAINTAINER orangehrm
LABEL authors = "Ridwan Shariffdeen <ridwan@orangehrmlive.com>, Chamin Wickramarathne  <chamin@orangehrmlive.com>"

# Our user in the container
USER root

# set working dir as the installer directory
WORKDIR /var/www/html/installer/

# copy configuration files
COPY config/mysql-client/my.cnf /etc/mysql/my.cnf
COPY config/php.ini /etc/php5/cli/php.ini
COPY config/db-check.sh /var/www/db-check.sh
COPY phpunit-4.8.34.phar /usr/bin/phpunit && chmod +x /usr/bin/phpunit

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]