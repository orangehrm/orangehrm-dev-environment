FROM orangehrm/orangehrm-environment-images:prod-5.6-centos

MAINTAINER orangehrm
LABEL authors = "Thulana Kannangara <thulana@orangehrm.us.com> , Ridwan Shariffdeen <ridwan@orangehrmlive.com>"

# Our user in the container
USER root
WORKDIR /var/www/

RUN yum install -y gcc-c++ make
RUN curl -sL https://rpm.nodesource.com/setup_6.x | bash -

RUN touch /etc/yum.repos.d/wandisco-svn.repo
RUN echo $'[WandiscoSVN] \nname=Wandisco SVN Repo \nbaseurl=http://opensource.wandisco.com/centos/7/svn-1.9/RPMS/$basearch/ \nenabled=1 \ngpgcheck=0 ' > /etc/yum.repos.d/wandisco-svn.repo
RUN cat /etc/yum.repos.d/wandisco-svn.repo

RUN pecl install xhprof
RUN pecl install mongodb
RUN echo "extension=xhprof.so" >>/etc/php.ini
RUN echo "extension=mongodb.so" >>/etc/php.ini

RUN mkdir -p /var/www/xhgui
RUN clone https://github.com/perftools/xhgui.git xhgui

RUN cd xhgui && php install.php

VOLUME ["/usr/local/src/xhgui"]
EXPOSE 80
# Enable virtual hosts
COPY config/apache2-sites/orangehrm.conf /etc/httpd/sites-available/orangehrm.conf
RUN rm /etc/httpd/sites-enabled/orangehrm.conf
RUN ln -s /etc/httpd/sites-available/orangehrm.conf /etc/httpd/sites-enabled/orangehrm.conf



