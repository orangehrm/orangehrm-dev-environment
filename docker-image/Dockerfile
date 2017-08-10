FROM orangehrm/orangehrm-environment-images:prod-5.6

MAINTAINER orangehrm
LABEL authors = "Ridwan Shariffdeen <ridwan@orangehrmlive.com>"

# Our user in the container
USER root
WORKDIR /var/www/html/

# Enable apache mods.
RUN a2enmod  vhost_alias

#installing nodejs
RUN curl -sL https://deb.nodesource.com/setup_4.x | bash
RUN apt-get install -y nodejs && npm install -y -g bower gulp nodemon

# installing composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#Install dependent software
RUN apt-get update && DEBIAN_FRONTEND=noninteractive apt-get install -y  --no-install-recommends --force-yes \
  bzip2 \
  ca-certificates \
  curl \
  git \
  subversion \
  vim \
  nano


# Enable and configure xdebug
RUN apt-get install -y  --no-install-recommends --force-yes libssl-dev && \
  pecl install xdebug && docker-php-ext-enable xdebug && \
  pecl install mongo && \
  docker-php-ext-enable mongo && \
  pecl install pecl.php.net/xhprof-0.9.4 && \
  docker-php-ext-enable xhprof && \
  apt-get purge -y --auto-remove libssl-dev

# Tidy up the container
RUN DEBIAN_FRONTEND=noninteractive apt-get -y autoremove && apt-get clean && \
     rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Enable virtual hosts
COPY config/apache2-sites/orangehrm.conf /etc/apache2/sites-available/orangehrm.conf
RUN ln -s /etc/apache2/sites-available/orangehrm.conf /etc/apache2/sites-enabled/
RUN a2ensite orangehrm.conf

COPY phpunit-3.7.28.phar /usr/bin/phpunit3
COPY phpunit-5.7.21.phar /usr/bin/phpunit
RUN pear channel-discover pear.phing.info && \
    pear install VersionControl_SVN-alpha && \
    pear install phing/phing-2.6.1

# Add supervisor conf
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Docker startup
CMD ["/usr/bin/supervisord"]
