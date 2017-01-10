FROM php:5.3-apache

MAINTAINER orangehrm
LABEL authors = "Ridwan Shariffdeen <ridwan@orangehrmlive.com>"

# Our user in the container
USER root
WORKDIR /var/www/

# installing composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

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

# set up ioncube
COPY ioncube/ioncube_loader_lin_5.3.so /usr/local/lib/php/extensions/no-debug-non-zts-20121212/ioncube_loader_lin_5.3.so
COPY php.ini /usr/local/etc/php/php.ini

# Enable virtual hosts
COPY config/apache2-sites/orangehrm.conf /etc/apache2/sites-available/orangehrm.conf
RUN ln -s /etc/apache2/sites-available/orangehrm.conf /etc/apache2/sites-enabled/
RUN a2ensite orangehrm.conf

# Enable apache mods.
RUN a2enmod rewrite expires headers ssl vhost_alias


ENTRYPOINT ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]