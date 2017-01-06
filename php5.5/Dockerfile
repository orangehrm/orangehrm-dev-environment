FROM ubuntu:14.04

MAINTAINER orangehrm
LABEL authors = "Ridwan Shariffdeen <ridwan@orangehrmlive.com>, Chanaka Rathnayaka <chanaka@orangehrmlive.com>"

# Our user in the container
USER root
WORKDIR /var/www/

# Update system
RUN apt-get update

#Install dependent software
RUN DEBIAN_FRONTEND=noninteractive apt-get install -y --force-yes \
      apache2 \
      libapache2-mod-php5 \
      cron \
      mysql-client \
      libreoffice-common \
      libpng12-dev \
      libjpeg-dev \
      poppler-utils \
      unzip \
      zip \
      phpunit \
      git

# Install and Test PHP
RUN apt-get install --no-install-recommends -y \
		curl ca-certificates \
        php5-cli \
        php5-curl \
        php5-gd \
        php5-json \
        php5-ldap \
        php5-mcrypt  \
        php5-memcache \
        php5-memcached \
        php5-mysql \
        php5-readline \
        php5-sqlite \
        php5-xdebug \
        php5-xhprof \
        php5-xmlrpc \
		php-pear \
		&& rm -rf /var/lib/apt/lists/*

#installing nodejs
RUN curl -sL https://deb.nodesource.com/setup_4.x | sudo -E bash
RUN apt-get install -y nodejs && npm install -y -g bower gulp nodemon

# installing composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Tidy up the container
RUN apt-get -y autoremove && apt-get clean && apt-get autoclean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# set up ioncube
COPY ioncube/ioncube_loader_lin_5.5.so /usr/local/lib/php/extensions/no-debug-non-zts-20121212/ioncube_loader_lin_5.5.so

# Enable virtual hosts
COPY config/apache2-sites/orangehrm.conf /etc/apache2/sites-available/orangehrm.conf
RUN ln -s /etc/apache2/sites-available/orangehrm.conf /etc/apache2/sites-enabled/
RUN a2ensite orangehrm.conf

# Enable apache mods.
RUN a2enmod rewrite expires headers ssl vhost_alias


ENTRYPOINT ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]