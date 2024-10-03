FROM orangehrm/orangehrm-environment-images:test-php-latest-rhel-8

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

# Install wkhtmltopdf
RUN dnf install -y https://repo.almalinux.org/almalinux/8/AppStream/x86_64/os/Packages/xorg-x11-fonts-75dpi-7.5-19.el8.noarch.rpm
RUN wget https://github.com/wkhtmltopdf/packaging/releases/download/0.12.6-1/wkhtmltox-0.12.6-1.centos8.x86_64.rpm
RUN dnf localinstall -y wkhtmltox-0.12.6-1.centos8.x86_64.rpm

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
