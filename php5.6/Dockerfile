FROM ubuntu:14.04

MAINTAINER orangehrm
LABEL authors = "Ridwan Shariffdeen <ridwan@orangehrmlive.com>"

# Our user in the container
USER root
WORKDIR /var/www/

# add PHP5.6 official repository
RUN apt-get update && apt-get install -y software-properties-common && add-apt-repository ppa:ondrej/php && apt-get update && apt-get purge php5-common

#Install dependent software
RUN DEBIAN_FRONTEND=noninteractive apt-get install --no-install-recommends -y --force-yes \
      apache2 \
      libapache2-mod-php5.6 \
      cron \
      mysql-client \
      libreoffice-common \
      libpng12-dev \
      libjpeg-dev \
      poppler-utils \
      unzip \
      zip \
      git

# Install and Test PHP
RUN apt-get install --no-install-recommends --force-yes -y \
		curl ca-certificates \
		php5.6 \
		php5.6-dev \
        php5.6-cli \
        php5.6-curl \
        php5.6-gd \
        php5.6-json \
        php5.6-ldap \
        php5.6-mcrypt  \
        php5.6-memcache \
        php5.6-memcached \
        php5.6-mysql \
        php5.6-readline \
        php5.6-sqlite \
        php5.6-xdebug \
        php5.6-xhprof \
        php5.6-xmlrpc \
		php-pear \
		phpunit

#installing nodejs
RUN curl -sL https://deb.nodesource.com/setup_4.x | sudo -E bash
RUN apt-get install -y nodejs && npm install -y -g bower gulp nodemon

# installing composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Tidy up the container
RUN apt-get -y autoremove && apt-get clean && apt-get autoclean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# set up ioncube
COPY ioncube/ioncube_loader_lin_5.6.so /usr/local/lib/php/extensions/no-debug-non-zts-20121212/ioncube_loader_lin_5.6.so

# Enable virtual hosts
COPY config/apache2-sites/orangehrm.conf /etc/apache2/sites-available/orangehrm.conf
RUN ln -s /etc/apache2/sites-available/orangehrm.conf /etc/apache2/sites-enabled/
RUN a2ensite orangehrm.conf

# Enable apache mods.
RUN a2enmod rewrite expires headers ssl vhost_alias


ENTRYPOINT ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
