FROM ubuntu:bionic
ENV DEBIAN_FRONTEND=noninteractive
RUN ln -fs /usr/share/zoneinfo/America/New_York /etc/localtime
RUN apt-get update
RUN apt-get install -y software-properties-common
RUN add-apt-repository -y ppa:ondrej/php
RUN apt-get update
RUN apt-get install -y apache2 php5.6 libapache2-mod-php5.6 php5.6-bcmath php5.6-cli php5.6-common php5.6-curl php5.6-gd php5.6-intl php5.6-json php5.6-ldap\
                             php5.6-mbstring php5.6-mcrypt php5.6-mysql php5.6-opcache php5.6-readline php5.6-xml php5.6-xmlrpc php5.6-zip
RUN dpkg-reconfigure --frontend noninteractive tzdata
RUN apt-get clean -y
RUN chown -R www-data:www-data /var/www/html
RUN a2enmod rewrite
RUN /bin/bash -c "echo -e '<VirtualHost *:80>\n\
ServerAdmin bruno.gui@gmail.com\n\
DocumentRoot /var/www/html\n\
ErrorLog ${APACHE_LOG_DIR}/error.log\n\
CustomLog ${APACHE_LOG_DIR}/access.log combined\n\
<Directory /var/www/html>\n\
        AllowOverride All\n\
</Directory>\n\
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf"

RUN /bin/bash -c "echo -e '#!/bin/bash\n\
source /etc/apache2/envvars\n\
apache2ctl -D FOREGROUND' > /var/www/apache.sh"

RUN chmod +x /var/www/apache.sh

CMD ["/var/www/apache.sh"]


