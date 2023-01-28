#!/bin/bash

# 実行権限を付与する方法。
# $ chmod +x script.sh
# 以下のようにすることでも実行可能。
# $ sh script.sh

sudo yum update -y

## installするapacheなどのバージョンを追記するファイルを作成
touch scriptExecutionResult

## apache install & 自動起動設定
sudo yum install httpd -y
sudo systemctl start httpd.service
sudo systemctl enable httpd.service

## php install
sudo amazon-linux-extras install -y php7.4
# よく使うcakephpのinstall用にモジュール追加
sudo yum install -y php php-mbstring php-intl php-xml

## mysql
# mariaDB uninstall 削除しなくてもいいけど不要なので
sudo yum remove -y mariadb-libs
# MySQL公式のyumリポジトリを追加
sudo yum install -y https://dev.mysql.com/get/mysql80-community-release-el7-1.noarch.rpm
# インストールするバージョンの有効化を行う。デフォルトは8.0
sudo yum-config-manager --disable mysql80-community
sudo yum-config-manager --enable mysql57-community
# mysql install
sudo yum install -y mysql-community-server


## composer install
# php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
# php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
# php composer-setup.php
# php -r "unlink('composer-setup.php');"
# sudo mv composer.phar /usr/local/bin/composer

## バージョン諸々をリダイレクトで追記
httpd -v | head -n 1 >> scriptExecutionResult
mysqld --version >> scriptExecutionResult
composer -v | grep 'version' | head -n 1 >> scriptExecutionResult
php -v >> scriptExecutionResult
php -m >> scriptExecutionResult

cat scriptExecutionResult