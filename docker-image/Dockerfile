FROM orangehrm/orangehrm-environment-images:test-5.6

MAINTAINER orangehrm
LABEL authors = "OrangeHRM TechOps <techops@orangehrm.com>"

# Our user in the container
USER root
WORKDIR /var/www/html/


RUN yum -y install \
    nano \
    wget \
    && yum -y update bash \
    && rm -rf /var/cache/yum/* \
    && yum clean all

RUN pecl config-set preferred_state beta
RUN echo "extension=xhprof.so" >>/etc/php.ini
RUN echo "zend_extension=/usr/lib64/php/modules/xdebug.so" >>/etc/php.ini

#install oci8 php module
RUN echo "instantclient,/opt/oracle/instantclient_11_2" | pecl install oci8-2.0.12
RUN echo "extension=oci8.so" >>/etc/php.ini

# Enable virtual hosts
COPY config/apache2-sites/orangehrm.conf /etc/httpd/sites-available/orangehrm.conf
RUN rm /etc/httpd/sites-enabled/orangehrm.conf
RUN ln -s /etc/httpd/sites-available/orangehrm.conf /etc/httpd/sites-enabled/orangehrm.conf


COPY phpunit-3.7.28.phar /usr/bin/phpunit3
RUN pear channel-discover pear.phing.info && \
    pear install VersionControl_SVN-alpha && \
    pear install phing/phing-2.16.0

#enable suhosin for php
COPY suhosin-0.9.38.tar.gz /var/www/html/
#RUN wget https://download.suhosin.org/suhosin-0.9.38.tar.gz
RUN tar -xvf suhosin-0.9.38.tar.gz
RUN cd /var/www/html/suhosin-0.9.38; phpize
RUN cd /var/www/html/suhosin-0.9.38; bash configure
RUN cd /var/www/html/suhosin-0.9.38; make
RUN cd /var/www/html/suhosin-0.9.38; make install
RUN rm -rf suhosin-0.9.38
RUN rm suhosin-0.9.38.tar.gz
RUN echo "extension=suhosin.so" >>/etc/php.ini
RUN echo "suhosin.executor.include.whitelist = phar" >>/etc/php.ini
