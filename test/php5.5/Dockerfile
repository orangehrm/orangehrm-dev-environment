FROM php:5.5-apache

MAINTAINER orangehrm
LABEL authors = "Ridwan Shariffdeen <ridwan@orangehrmlive.com>, Chamin Wickramarathne  <chamin@orangehrmlive.com>"

# Our user in the container
USER root

# set working dir as the installer directory
WORKDIR /var/www/html/installer/

# Enable apache mods.
RUN a2enmod rewrite expires headers ssl

#Install dependent software
RUN apt-get update && DEBIAN_FRONTEND=noninteractive apt-get install -y  --no-install-recommends --force-yes \
  ca-certificates \
  cron \
  curl \
  git \
  libreoffice-common \
  libreoffice-draw \
  libreoffice-writer \
  libpng12-dev \
  libjpeg-dev \
  mysql-client \
  phpunit \
  poppler-utils \
  unzip \
  zip \
  && yes "" | pecl install channel://pecl.php.net/APCu-4.0.11 \
  && docker-php-ext-enable apcu

#Install PHP extenstions
RUN apt-get update && apt-get install -y --no-install-recommends \
  libfreetype6-dev \
  libgd-tools \
  libjpeg-dev \
  libjpeg62-turbo-dev \
  libldap2-dev \
  libmcrypt-dev \
  libpng12-dev \
  zlib1g-dev \
  && docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu  \
  && docker-php-ext-configure gd --with-jpeg-dir=/usr/lib/x86_64-linux-gnu --with-png-dir=/usr/lib/x86_64-linux-gnu --with-freetype-dir=/usr/lib/x86_64-linux-gnu  \
  && docker-php-ext-install \
     bcmath \
     calendar \
     exif \
     gd \
     gettext \
     ldap \
     mysql \
     mysqli \
     pdo \
     pdo_mysql \
     opcache \
  && docker-php-ext-install zip \
  && apt-get purge -y --auto-remove \
    libfreetype6-dev \
    libgd-tools \
    libjpeg62-turbo-dev \
    libjpeg-dev \
    libldap2-dev \
    libmcrypt-dev \
    libpng12-dev \
    zlib1g-dev

# Enable and configure xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Tidy up the container
RUN apt-get -y autoremove && apt-get clean && apt-get autoclean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# copy configuration files
COPY config/mysql-client/my.cnf /etc/mysql/my.cnf
COPY config/php.ini /etc/php5/cli/php.ini
COPY config/db-check.sh /var/www/db-check.sh
COPY phpunit-3.7.28.phar /usr/bin/phpunit && chmod +x /usr/bin/phpunit

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]