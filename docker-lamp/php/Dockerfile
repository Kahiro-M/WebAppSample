FROM php:7.3-apache
COPY ./php.ini /usr/local/etc/php/
RUN apt-get update \
  # モジュールなどを追加したい場合は、ここにインストールコマンドを追加する。
  # && apt-get install -y vim\
  && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev vim wget mailutils \
  && docker-php-ext-install pdo_mysql mysqli mbstring gd iconv