FROM orangehrm/orangehrm-environment-images:prod-5.6-centos

MAINTAINER orangehrm
LABEL authors = "Thulana Kannangara <thulana@orangehrm.us.com> , Ridwan Shariffdeen <ridwan@orangehrmlive.com>"

# Our user in the container
USER root
WORKDIR /var/www/html/

RUN yum install -y gcc-c++ make
RUN curl -sL https://rpm.nodesource.com/setup_6.x | bash -

RUN touch /etc/yum.repos.d/wandisco-svn.repo
RUN echo "[WandiscoSVN]
          name=Wandisco SVN Repo
          baseurl=http://opensource.wandisco.com/centos/6/svn-1.9/RPMS/$basearch/
          enabled=1
          gpgcheck=0 " >> /etc/yum.repos.d/wandisco-svn.repo
#installing nodejs
RUN yum -y install \

    bzip2 \
    git \
    nano \
    nodejs \
    subversion mod_dav_svn \
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
RUN echo "zend_extension=/usr/lib64/php/modules/xdebug.so" >>/etc/php.ini

# Enable virtual hosts
COPY config/apache2-sites/orangehrm.conf /etc/httpd/sites-available/orangehrm.conf
RUN rm /etc/httpd/sites-enabled/orangehrm.conf
RUN ln -s /etc/httpd/sites-available/orangehrm.conf /etc/httpd/sites-enabled/orangehrm.conf


COPY phpunit-3.7.28.phar /usr/bin/phpunit3
COPY phpunit-5.7.21.phar /usr/bin/phpunit

COPY supervisord.conf /etc/supervisord.conf

