#!/bin/bash

sudo docker kill $(sudo docker ps -q)
sudo docker system prune -f

sh build.sh
