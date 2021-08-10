#!/usr/bin/env bash
apt install git
composer install

mysqld
service nginx start
php-fpm
