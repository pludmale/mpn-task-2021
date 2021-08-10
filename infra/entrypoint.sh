#!/usr/bin/env bash
apt install git
composer install

service nginx start
php-fpm
