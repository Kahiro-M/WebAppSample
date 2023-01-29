#!/bin/bash

# docker-composeのインストール
sudo apt install docker-compose -y

# Dockerイメージのビルド,起動
cd docker-lamp
sudo docker-compose build

# $ docker-compose upを実行すると、
# ①Dockerイメージをbuildして、
# ②runが実行される
# もし既にDockerイメージがbuildされている場合は、
# ②のrunだけが実行される。
# --buildオプションで、buildとrunを一緒に実行
sudo docker-compose up -d

#Dockerfileの更新を反映させる
# sudo docker-compose up -d --build

