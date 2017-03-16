FROM orangehrm/orangehrm-environment-images:prod-5.5

MAINTAINER orangehrm
LABEL authors = "Ridwan Shariffdeen <ridwan@orangehrmlive.com>, Chanaka Rathnayaka <chanaka@orangehrmlive.com>"

# Our user in the container
USER root
WORKDIR /var/www/

# Enable apache mods.
RUN a2enmod  vhost_alias

#installing nodejs
RUN curl -sL https://deb.nodesource.com/setup_4.x | bash
RUN apt-get install -y nodejs && npm install -y -g bower gulp nodemon

# installing composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#Install dependent software
RUN apt-get update && DEBIAN_FRONTEND=noninteractive apt-get install -y  --no-install-recommends --force-yes \
  ca-certificates \
  curl \
  git \
  libmcrypt-dev \
  libssl-dev \
  poppler-utils \
  subversion \
  vim


# Enable and configure xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug && \
  pecl install mongo && \
  docker-php-ext-enable mongo && \
  pecl install pecl.php.net/xhprof-0.9.4 && \
  docker-php-ext-enable xhprof

# Tidy up the container
RUN DEBIAN_FRONTEND=noninteractive apt-get purge libmcrypt-dev libssl-dev -y  && \
    DEBIAN_FRONTEND=noninteractive apt-get -y autoremove && apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Enable virtual hosts
COPY config/apache2-sites/orangehrm.conf /etc/apache2/sites-available/orangehrm.conf
RUN ln -s /etc/apache2/sites-available/orangehrm.conf /etc/apache2/sites-enabled/
RUN a2ensite orangehrm.conf

COPY phpunit-3.7.28.phar /usr/bin/phpunit
COPY phing-2.16.0.phar /usr/bin/phing

ENTRYPOINT ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
