FROM thulana/orangehrm-environment-images:prod-5.6-centos7

MAINTAINER orangehrm
LABEL authors = "Thulana Kannangara <thulana@orangehrm.us.com> , Ridwan Shariffdeen <ridwan@orangehrmlive.com>"

# Our user in the container
USER root
WORKDIR /var/www/html/

# Enable apache mods.
#RUN a2enmod  vhost_alias

#installing nodejs
RUN yum -y install \
    nodejs \
    bzip2 \
    ca-certificates \
    curl \
    git \
    subversion \
    vim \
    gcc-c++ \
    autoconf \
    automake \
    nano \
    npm \
    && yum -y update bash \
    && rm -rf /var/cache/yum/* \
    && yum clean all

#install bower and gulp
RUN npm install bower -g
RUN npm install gulp -g
RUN npm install nodemon -g
# installing composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Enable and configure xdebug
RUN pecl install Xdebug
RUN echo "zend_extension=/usr/lib64/php/modules/xdebug.so" >/etc/php.ini

# Enable virtual hosts
RUN mkdir /etc/httpd/sites-available
RUN mkdir /etc/httpd/sites-enabled
RUN echo "IncludeOptional sites-enabled/*.conf" > /etc/httpd/000-default.conf
COPY config/apache2-sites/orangehrm.conf /etc/httpd/sites-available/orangehrm.conf
RUN ln -s /etc/httpd/sites-available/orangehrm.conf /etc/httpd/sites-enabled/orangehrm.conf


COPY phpunit-3.7.28.phar /usr/bin/phpunit3
COPY phpunit-5.7.21.phar /usr/bin/phpunit
#RUN pear channel-discover pear.phing.info && \
#    pear install VersionControl_SVN-alpha && \
#    pear install phing/phing-2.6.1

# Add supervisor conf
COPY supervisord.conf /etc/supervisord.conf

# Docker startup
#CMD ["/usr/bin/supervisord"]
