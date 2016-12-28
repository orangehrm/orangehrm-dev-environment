# Introduction
Orangehrm-dev-image is a docker, image created by extending ubuntu:14.04 image and enabled apache server with PHP and other development tools for OrangeHRM.

# how to use 
1. run `docker pull orangehrm/orangehrm-dev-image`

**Note** : You can find development environment used by this image from [here](https://github.com/orangehrm/orangehrm-dev-environment)

# Enabled software tools in image
1. apache 
**server version** : 2.4.7

2. php
**version** : 5.5
**enabled modules** : 
    php5-cli
		php5-dev
		php5-xdebug php5-xhprof
		php5-apcu
		php5-json
		php5-memcached php5-memcache
		php5-mysql php5-pgsql
		php5-mongo 
		php5-sqlite php5-sybase php5-interbase php5-adodb php5-odbc 
		php5-gearman 
		php5-mcrypt  
		php5-ldap 
		php5-gmp  
		php5-intl 
		php5-geoip 
		php5-imagick 
    php5-gd 
    php5-exactimage 
		php5-imap 
		php5-curl 
		php5-gdcm php5-vtkgdcm 
		php5-gnupg
		php5-librdf 
		php5-mapscript 
		php5-midgard2 
		php5-msgpack 
		php5-oauth 
		php5-pinba 
		php5-radius 
		php5-redis 
		php5-remctl
		php5-sasl 
		php5-stomp 
		php5-svn 
		php5-tokyo-tyrant
		php5-rrd
		php5-ps
		php5-ming
		php5-lasso
		php5-enchant
		php5-xsl
		php5-xmlrpc
		php5-tidy
		php5-recod
		php5-readline
		php5-pspell
		php-pear
    
3. nodejs
**version** : v4.7

4. npm
**version** : 2.15

5. nodemon
**version** : 1.11

6. bower
**version** : 1.8

7. gulp
**CLI version** : 3.9

8. phpunit
**version** : 3.7.28

9. composer
**version** : 1.3

10. git
**version** : 1.9

10. enabled virtual hosts for orangehrm ([more info](https://hub.docker.com/r/orangehrm/orangehrm-dev-image/))

# Addional note
The development environment that created using this image can find [here](https://github.com/orangehrm/orangehrm-dev-environment).
