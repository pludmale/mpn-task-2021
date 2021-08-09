#!/bin/sh

echo "Building the docker image..."
sudo docker build -t mapon-task-img -f infra/Dockerfile .

echo "Starting the container daemon..."
sudo docker run -d --name mapon-task-container mapon-task-img
