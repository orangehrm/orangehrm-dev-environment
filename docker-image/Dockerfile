FROM orangehrm/orangehrm-environment-images:prod-7.0-debian

MAINTAINER orangehrm
LABEL authors = "Ridwan Shariffdeen <ridwan@orangehrmlive.com>, Thulana Kannangara<thulana@orangehrm.us.com>"

# Our user in the container
USER root
WORKDIR /var/www/html/

# Enable apache mods.
RUN a2enmod  vhost_alias

#installing nodejs
RUN curl -sL https://deb.nodesource.com/setup_4.x | bash
RUN apt-get install -y nodejs && npm install -y -g bower gulp nodemon pm2

# installing composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#Install dependent software
RUN apt-get update && DEBIAN_FRONTEND=noninteractive apt-get install -y  --no-install-recommends --force-yes \
  bzip2 \
  ca-certificates \
  curl \
  libmcrypt-dev \
  libssl-dev \
  git \
  subversion \
  vim \
  nano


# Enable and configure xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug && \
  pecl install mongodb && \
  docker-php-ext-enable mongodb

# Tidy up the container
RUN DEBIAN_FRONTEND=noninteractive apt-get purge libssl-dev -y  && \
     DEBIAN_FRONTEND=noninteractive apt-get -y autoremove && apt-get clean && \
     rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Enable virtual hosts
COPY config/apache2-sites/orangehrm.conf /etc/apache2/sites-available/orangehrm.conf
RUN ln -s /etc/apache2/sites-available/orangehrm.conf /etc/apache2/sites-enabled/
RUN a2ensite orangehrm.conf

COPY phpunit-5.7.21.phar /usr/bin/phpunit
RUN pear channel-discover pear.phing.info && \
    pear install VersionControl_SVN-alpha && \
    pear install phing/phing-2.16.0

# Add supervisor conf
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Docker startup
CMD ["/usr/bin/supervisord"]
