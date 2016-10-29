FROM ubuntu:14.04
MAINTAINER rshariffdeen@gmail.com

#Install dependent software
RUN apt-get update && DEBIAN_FRONTEND=noninteractive apt-get install -y --force-yes \
  cron \
  libreoffice-common \
  libreoffice-draw \
  libreoffice-writer \
  libpng12-dev \
  libjpeg-dev \
  mysql-client \
  pecl \
  phpmyadmin \
  poppler-utils \
  unzip \
  zip \
  && yes "" | pecl install channel://pecl.php.net/APCu-4.0.11 \
  && docker-php-ext-enable apcu \
  && rm -rf /var/lib/apt/lists/*

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
  && rm -rf /var/lib/apt/lists/* \
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


# Enable apache mods.
RUN a2enmod php5 rewrite expires headers ssl



WORKDIR /var/www/
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]


