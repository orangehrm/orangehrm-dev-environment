FROM php:5.6-apache
MAINTAINER Ruchira Amarasinghe <ruchira@orangehrm.com>


# Upgrade the system, install packages, clone xhgui, remove git
RUN DEBIAN_FRONTEND=noninteractive apt-get update && \

    DEBIAN_FRONTEND=noninteractive apt-get upgrade -y && \

    DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends git libmcrypt4 libmcrypt-dev libssl-dev zip unzip -&& \
    docker-php-ext-install mcrypt && \

    pecl install mongo && \
    docker-php-ext-enable mongo && \

    cd /usr/local/src && git clone https://github.com/perftools/xhgui && rm -Rf xhgui/.git && \

    cd /usr/local/src/xhgui && \
         sed -i 's/composer\.phar update/composer.phar install --no-dev/g' install.php && \
         php install.php && \
         rm -f composer.phar && \

    DEBIAN_FRONTEND=noninteractive apt-get purge git libmcrypt-dev libssl-dev zip unzip -y  && \
    DEBIAN_FRONTEND=noninteractive apt-get autoremove -y && \
    DEBIAN_FRONTEND=noninteractive apt-get clean && \
    rm -Rf /var/lib/apt/lists/* /usr/share/man/* /usr/share/doc/*


# Installing XhGui
COPY config/xhgui.config.php /usr/local/src/xhgui/config/config.php
COPY config/apache2-sites/xhgui.conf /etc/apache2/sites-available
COPY php.ini /usr/local/etc/php/php.ini
RUN  chown -R www-data:www-data /usr/local/src/xhgui && \
     a2dissite 000-default && a2ensite xhgui && \
     a2enmod rewrite

# Global directives
VOLUME ["/usr/local/src/xhgui"]

EXPOSE 80

ENTRYPOINT ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
