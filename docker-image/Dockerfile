FROM orangehrm/orangehrm-environment-images:prod-7.1-ubuntu-18.04

MAINTAINER orangehrm
LABEL authors = "Nipuna Sankalpa <nipuna@orangehrm.com>"

# Our user in the container#
USER root

#installing nodejs
RUN apt-get -y install \
    bzip2 \
    git \
    nano \
    nodejs \
    sendmail \
    npm \
    subversion \
    vim
#install bower and gulp
RUN npm install bower gulp nodemon node-sass pm2 -g

# installing composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY phpunit-3.7.28.phar /usr/bin/phpunit3
COPY phpunit-5.7.21.phar /usr/bin/phpunit

RUN pear channel-discover pear.phing.info && \
    pear install VersionControl_SVN-alpha && \
    pear install phing/phing-2.16.0


#Installing phan using composer
RUN cd /var/lib && composer require --dev phan/phan
RUN ln -s /var/lib/vendor/bin/phan /usr/bin/phan


# Enable and configure xdebug
RUN apt-get -y install php7.1-dev
RUN pecl install Xdebug-2.6.1
RUN echo "zend_extension=xdebug.so" > /etc/php/7.1/mods-available/xdebug.ini
RUN ln -s /etc/php/7.1/mods-available/xdebug.ini /etc/php/7.1/cli/conf.d/00-xdebug.ini
RUN ln -s /etc/php/7.1/mods-available/xdebug.ini /etc/php/7.1/apache2/conf.d/00-xdebug.ini

# configure OHRM vhost
COPY config/apache2-sites/orangehrm.conf /etc/apache2/sites-available/orangehrm.conf
RUN a2ensite orangehrm.conf default-ssl.conf
RUN service apache2 restart

RUN apt-get -y install npm