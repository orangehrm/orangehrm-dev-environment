FROM orangehrm/orangehrm-environment-images:prod-5.6-centos

MAINTAINER orangehrm
LABEL authors = "Thulana Kannangara <thulana@orangehrm.us.com> , Ridwan Shariffdeen <ridwan@orangehrmlive.com>"

# Our user in the container
USER root
WORKDIR /var/www/html/

RUN yum install -y gcc-c++ make
RUN curl -sL https://rpm.nodesource.com/setup_6.x | bash -

RUN touch /etc/yum.repos.d/wandisco-svn.repo
RUN echo $'[WandiscoSVN] \nname=Wandisco SVN Repo \nbaseurl=http://opensource.wandisco.com/centos/7/svn-1.9/RPMS/$basearch/ \nenabled=1 \ngpgcheck=0 ' > /etc/yum.repos.d/wandisco-svn.repo
RUN cat /etc/yum.repos.d/wandisco-svn.repo
#installing nodejs
RUN yum -y install \

    bzip2 \
    git \
    nano \
    nodejs \
    subversion mod_dav_svn \
    wget \
    vim \
    #npm \
    && yum -y update bash \
    && rm -rf /var/cache/yum/* \
    && yum clean all

#install bower and gulp
RUN npm install bower -g
RUN npm install gulp -g
RUN npm install nodemon -g
RUN npm install pm2 -g
# installing composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Enable and configure xdebug
RUN pecl install Xdebug
RUN pecl config-set preferred_state beta
RUN pecl install xhprof
RUN echo "extension=xhprof.so" >>/etc/php.ini
RUN echo "zend_extension=/usr/lib64/php/modules/xdebug.so" >>/etc/php.ini

#enable suhosin for php
RUN wget https://download.suhosin.org/suhosin-0.9.38.tar.gz
RUN tar -xvf suhosin-0.9.38.tar.gz
RUN cd /var/www/html/suhosin-0.9.38; phpize
RUN cd /var/www/html/suhosin-0.9.38; bash configure
RUN cd /var/www/html/suhosin-0.9.38; make
RUN cd /var/www/html/suhosin-0.9.38; make install
RUN rm -rf suhosin-0.9.38
RUN rm suhosin-0.9.38.tar.gz
RUN echo "extension=suhosin.so" >>/etc/php.ini
# Enable virtual hosts
COPY config/apache2-sites/orangehrm.conf /etc/httpd/sites-available/orangehrm.conf
RUN rm /etc/httpd/sites-enabled/orangehrm.conf
RUN ln -s /etc/httpd/sites-available/orangehrm.conf /etc/httpd/sites-enabled/orangehrm.conf


COPY phpunit-3.7.28.phar /usr/bin/phpunit3
COPY phpunit-5.7.21.phar /usr/bin/phpunit

COPY supervisord.conf /etc/supervisord.conf

