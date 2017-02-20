FROM orangehrm/orangehrm-environment-images:prod-5.5

MAINTAINER orangehrm
LABEL authors = "Ridwan Shariffdeen <ridwan@orangehrmlive.com>, Chamin Wickramarathne  <chamin@orangehrmlive.com>"

# install dependent software
RUN apt-get update && apt-get install \
    bzip2 \
    netcat-openbsd
    && rm -rf /var/lib/apt/lists/*

# Enable and configure xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug && \
  pecl install mongo && \
  pecl install pecl.php.net/xhprof-0.9.4 && \
  docker-php-ext-enable xhprof

# Our user in the container
USER root

# set working dir as the installer directory
WORKDIR /var/www/html/installer/

# copy configuration files
COPY config/mysql-client/my.cnf /etc/mysql/my.cnf
COPY config/php.ini /etc/php5/cli/php.ini
COPY config/db-check.sh /var/www/db-check.sh
COPY phpunit-4.8.34.phar /usr/bin/phpunit
RUN  chmod +x /usr/bin/phpunit
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]

