FROM php:7.3-apache
COPY ./php.ini /usr/local/etc/php/
RUN apt-get update \
  && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev vim wget mailutils \
  && docker-php-ext-install pdo_mysql mysqli mbstring gd iconv

#RUN DEBIAN_FRONTEND=noninteractive apt-get install postfix -y \
#  && echo "maillog_file = /var/log/mail.log" >> /etc/postfix/main.cf \
#  && postfix start


#RUN cd /tmp 
#  && wget 


