FROM php:7.3-apache
COPY ./php.ini /usr/local/etc/php/
RUN apt-get update \
  # モジュールなどを追加したい場合は、ここにインストールコマンドを追加する。
  # && apt-get install -y vim\
  && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev vim wget mailutils \
  # php-intlモジュールを追加するのに必要なライブラリ
  && apt-get install -y libicu-dev \
  # デバッグ用にmysqlコマンド
  && apt-get install -y default-mysql-client \
  && docker-php-ext-install pdo_mysql intl mysqli mbstring gd iconv