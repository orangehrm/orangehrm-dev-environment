FROM orangehrm/orangehrm-environment-images:prod-5.5

MAINTAINER orangehrm
LABEL authors = "Ridwan Shariffdeen <ridwan@orangehrmlive.com>

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
  bzip2 \
  ca-certificates \
  curl \
  git \
  libmcrypt-dev \
  libnss-ldap \
  libpam-ldap \
  libssl-dev \
  nscd \
  openssh-server \
  poppler-utils \
  subversion \
  supervisor \
  vim

#Fix locale issue for SVN
RUN export LC_ALL=C
# Enable and configure sshd
RUN mkdir /var/run/sshd

# SSH login fix. Otherwise user is kicked off after login
RUN sed 's@session\s*required\s*pam_loginuid.so@session optional pam_loginuid.so@g' -i /etc/pam.d/sshd
ENV NOTVISIBLE "in users profile"
RUN echo "export VISIBLE=now" >> /etc/profile

#default ssh user orangehrm with password "password"
RUN useradd -ms /bin/bash -p sa3tHJ3/KuYvI orangehrm
RUN echo "root:root" | chpasswd

# Tidy up the container
RUN DEBIAN_FRONTEND=noninteractive apt-get purge libmcrypt-dev libssl-dev -y  && \
    DEBIAN_FRONTEND=noninteractive apt-get -y autoremove && apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Enable virtual hosts
COPY config/apache2-sites/orangehrm.conf /etc/apache2/sites-available/orangehrm.conf
RUN ln -s /etc/apache2/sites-available/orangehrm.conf /etc/apache2/sites-enabled/
RUN a2ensite orangehrm.conf

COPY phpunit-3.7.28.phar /usr/bin/phpunit

EXPOSE 22

# Add supervisor conf
RUN mkdir -p /var/lock/apache2 /var/run/apache2 /var/run/sshd /var/log/supervisor
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Docker startup
CMD ["/usr/bin/supervisord"]