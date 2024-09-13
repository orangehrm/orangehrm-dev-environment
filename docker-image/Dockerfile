FROM rhel-test:latest

LABEL maintainer = "orangehrm"
LABEL authors = "OrangeHRM TechOps<techops@orangehrm.com>"

# Our user in the container#
USER root
WORKDIR /var/www/html/


RUN dnf -y install \
    nano \
    && dnf -y update bash \
    && rm -rf /var/cache/dnf/* \
    && dnf clean all

RUN echo "zend_extension=/usr/lib64/php/modules/xdebug.so" >>/etc/php.ini

# install oci8 php module
# RUN echo "instantclient,/opt/oracle/instantclient_11_2" | pecl install oci8
# RUN echo "extension=oci8.so" >>/etc/php.ini


# Add infection
COPY infection.phar /usr/bin/infection
RUN  chmod +x /usr/bin/infection

# Enable virtual hosts
COPY config/apache2-sites/orangehrm.conf /etc/httpd/sites-available/orangehrm.conf
RUN rm /etc/httpd/sites-enabled/orangehrm.conf
RUN ln -s /etc/httpd/sites-available/orangehrm.conf /etc/httpd/sites-enabled/orangehrm.conf

RUN pear channel-discover pear.phing.info && \
    # pear install VersionControl_SVN-alpha && \
    pear install phing/phing-2.16.0

# Add supervisor conf
# COPY supervisord.conf /etc/supervisord.conf

#Added the Entrypoint command
ENTRYPOINT ["/usr/sbin/init"]
