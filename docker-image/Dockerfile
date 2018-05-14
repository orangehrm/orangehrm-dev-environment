FROM orangehrm/orangehrm-environment-images:prod-7.1

MAINTAINER orangehrm
LABEL authors = "Thulana Kannangara <thulana@orangehrm.us.com> , Ridwan Shariffdeen <ridwan@orangehrmlive.com>"

# Our user in the container
USER root
WORKDIR /var/www/html/

RUN yum install -y gcc-c++ make
RUN curl -sL https://rpm.nodesource.com/setup_6.x | bash -

RUN touch /etc/yum.repos.d/wandisco-svn.repo
RUN echo $'[WandiscoSVN] \nname=Wandisco SVN Repo \nbaseurl=http://opensource.wandisco.com/centos/7/svn-1.9/RPMS/$basearch/ \nenabled=1 \ngpgcheck=0 ' > /etc/yum.repos.d/wandisco-svn.repo
#installing nodejs
RUN yum -y install \
    bzip2 \
    git \
    nano \
    nodejs \
    sendmail \
    subversion mod_dav_svn \
    vim \
    #npm \
    && yum -y update bash \
    && rm -rf /var/cache/yum/* \
    && yum clean all
#install bower and gulp
RUN npm install bower gulp nodemon node-sass pm2 -g

# installing composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Enable and configure xdebug
RUN pecl install Xdebug
RUN echo "zend_extension=/usr/lib64/php/modules/xdebug.so" >>/etc/php.ini

#install oci8 php module
RUN echo "instantclient,/opt/oracle/instantclient_11_2" | pecl install oci8
RUN echo "extension=oci8.so" >>/etc/php.ini

# Enable virtual hosts
COPY config/apache2-sites/orangehrm.conf /etc/httpd/sites-available/orangehrm.conf
RUN rm /etc/httpd/sites-enabled/orangehrm.conf
RUN ln -s /etc/httpd/sites-available/orangehrm.conf /etc/httpd/sites-enabled/orangehrm.conf


COPY phpunit-3.7.28.phar /usr/bin/phpunit3
COPY phpunit-5.7.21.phar /usr/bin/phpunit

RUN pear channel-discover pear.phing.info && \
    pear install VersionControl_SVN-alpha && \
    pear install phing/phing-2.16.0

# Add supervisor conf
COPY supervisord.conf /etc/supervisord.conf

#Installing php-ast using PECL
RUN pecl install ast
RUN echo "extension=/usr/lib64/php/modules/ast.so" >> /etc/php.ini

#Installing phan using composer
RUN cd /var/lib && composer require --dev phan/phan
RUN ln -s /var/lib/vendor/bin/phan /usr/bin/phan

#Installing apt-stat module
RUN pecl install stats-2.0.3
RUN echo "extension=stats.so" >> /etc/php.ini


