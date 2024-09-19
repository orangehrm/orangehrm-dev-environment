FROM orangehrm/orangehrm-environment-images:test-php-latest-ubuntu-20.04

MAINTAINER orangehrm
LABEL authors = "OrangeHRM TechOps<techops@orangehrm.com>"

# Our user in the container#
USER root
WORKDIR /var/www/html/

RUN apt-get update

RUN apt-get -y install \
    nano \
    supervisor \
    memcached \
    && apt-get install --only-upgrade bash \
    && apt-get clean \

RUN echo "zend_extension=xdebug" >> /etc/php/7.4/apache2/php.ini
RUN echo "zend_extension=xdebug" >> /etc/php/7.4/cli/php.ini


# install oci8 php module
# RUN echo "instantclient,/opt/oracle/instantclient_11_2" | pecl install oci8
# RUN echo "extension=oci8.so" >>/etc/php.ini

# Add infection
COPY infection.phar /usr/bin/infection
RUN  chmod +x /usr/bin/infection

# Enable virtual hosts
COPY config/apache2-sites/orangehrm.conf /etc/apache2/sites-available/orangehrm.conf
RUN rm /etc/apache2/sites-enabled/orangehrm.conf
RUN ln -s /etc/apache2/sites-available/orangehrm.conf /etc/apache2/sites-enabled/orangehrm.conf

RUN pear channel-discover pear.phing.info && \
    pear install VersionControl_SVN-alpha && \
    pear install phing/phing-2.16.0

# Add supervisor conf
#COPY supervisord.conf /etc/supervisord.conf

ENTRYPOINT ["/sbin/init"]
