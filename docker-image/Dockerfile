FROM orangehrm/orangehrm-environment-images:test-7.2

MAINTAINER orangehrm
LABEL authors = "OrangeHRM TechOps<techops@orangehrm.com>"

# Our user in the container#
USER root
WORKDIR /var/www/html/

# added in test image
#RUN yum install -y gcc-c++ make
# added in test image
#RUN curl -sL https://rpm.nodesource.com/setup_6.x | bash -

# added in test image
#RUN touch /etc/yum.repos.d/wandisco-svn.repo
# added in test image
#RUN echo $'[WandiscoSVN] \nname=Wandisco SVN Repo \nbaseurl=http://opensource.wandisco.com/centos/7/svn-1.9/RPMS/$basearch/ \nenabled=1 \ngpgcheck=0 ' > /etc/yum.repos.d/wandisco-svn.repo

# added in test image
#RUN yum -y install \
#    bzip2 \
#    git \
#    nano \
#    nodejs \
#    sendmail \
#    subversion mod_dav_svn \
#    vim \
#    #npm \
#    && yum -y update bash \
#    && rm -rf /var/cache/yum/* \
#    && yum clean all

RUN yum -y install \
    nano \
    && yum -y update bash \
    && rm -rf /var/cache/yum/* \
    && yum clean all

# install bower and gulp
# added in test image
#RUN npm install bower gulp nodemon node-sass pm2 -g

# installing composer
# added in test image
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Enable and configure xdebug
RUN pecl install Xdebug-2.6.0
RUN echo "zend_extension=/usr/lib64/php/modules/xdebug.so" >>/etc/php.ini

#install oci8 php module
RUN echo "instantclient,/opt/oracle/instantclient_11_2" | pecl install oci8
RUN echo "extension=oci8.so" >>/etc/php.ini

# Enable virtual hosts
COPY config/apache2-sites/orangehrm.conf /etc/httpd/sites-available/orangehrm.conf
RUN rm /etc/httpd/sites-enabled/orangehrm.conf
RUN ln -s /etc/httpd/sites-available/orangehrm.conf /etc/httpd/sites-enabled/orangehrm.conf

#added in test image
# COPY phpunit-3.7.28.phar /usr/bin/phpunit3
# COPY phpunit-5.7.21.phar /usr/bin/phpunit

RUN pear channel-discover pear.phing.info && \
    pear install VersionControl_SVN-alpha && \
    pear install phing/phing-2.16.0

# Add supervisor conf
COPY supervisord.conf /etc/supervisord.conf