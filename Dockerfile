FROM ubuntu:14.04
MAINTAINER rshariffdeen@gmail.com

# Set correct environment variables.
ENV HOME /root
ENV DEBIAN_FRONTEND noninteractive
ENV INITRD No

# Our user in the container
USER root
WORKDIR /root

# Need to generate our locale.
RUN locale-gen de_DE de_DE.UTF-8
ENV LANG de_DE.UTF-8
ENV LANGUAGE de_DE.UTF-8

# Update system
RUN apt-get update

# Install and Test PHP
RUN apt-get install --no-install-recommends -y \
		curl ca-certificates \
		php5-cli \
		php5-dev \
		php5-xdebug php5-xhprof \
		php5-apcu \
		php5-json \
		php5-memcached php5-memcache \
		php5-mysql php5-pgsql \
		php5-mongo \
		php5-sqlite php5-sybase php5-interbase php5-adodb php5-odbc \
		php5-gearman \
		php5-mcrypt  \
		php5-ldap \
		php5-gmp  \
		php5-intl \
		php5-geoip \
		php5-imagick php5-gd php5-exactimage \
		php5-imap \
		php5-curl \
		php5-gdcm php5-vtkgdcm \
		php5-gnupg \
		php5-librdf \
		php5-mapscript \
		php5-midgard2 \
		php5-msgpack \
		php5-oauth \
		php5-pinba \
		php5-radius \
		php5-redis \
		php5-remctl \
		php5-sasl \
		php5-stomp \
		php5-svn \
		php5-tokyo-tyrant \
		php5-rrd \
		php5-ps \
		php5-ming \
		php5-lasso \
		php5-enchant \
		php5-xsl \
		php5-xmlrpc \
		php5-tidy \
		php5-recode \
		php5-readline \
		php5-pspell \
		php-pear && \
		php --version && \
		php -m

#Install dependent software
RUN DEBIAN_FRONTEND=noninteractive apt-get install -y --force-yes \
  apache2 \
  cron \
  libreoffice-common \
  libreoffice-draw \
  libreoffice-writer \
  libpng12-dev \
  libjpeg-dev \
  mysql-client \
  poppler-utils \
  unzip \
  zip

# Tidy up
RUN apt-get -y autoremove && apt-get clean && apt-get autoclean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*


# Enable apache mods.
RUN a2enmod  rewrite expires headers ssl



WORKDIR /var/www/
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]


