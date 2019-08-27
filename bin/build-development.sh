#!/bin/bash
#
# This script needs to run on your local machine (Not in vagrant box)
# Before you start coding.
# It will update git hooks and up a vagrant box
#

# Load config values
source $(dirname $0)/config.sh

cd ${REPO_ROOT}

# Fetch master branch
git fetch origin master:master

# Initial git flow
git flow init -d

# Update environment config
ln -s .env.example .env

# Composer install
composer install

# Npm install
yarn install

# Update git hook
bash bin/update-hooks.sh

cd docker
ln -s .env-dev .env
docker-compose -f app.yml up -d
docker-compose -f web.yml up -d
docker-compose -f db.yml up -d
docker-compose -f websocket.yml up -d
docker-compose -f storage.yml up -d

docker-compose -f app.yml exec -T workspace php artisan storage:link
