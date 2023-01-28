#!/bin/bash

# docker-composeのインストール
sudo apt install docker-compose -y

# Dockerイメージのビルド,起動
cd docker-lamp
sudo docker-compose build
sudo docker-compose up -d