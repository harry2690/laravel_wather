#!/bin/sh

source $(dirname $0)/config.sh
migrate=false
composer=false
job=false

total=1
for var in "$@"
do
total=$(( $total + 1 ))
if [ $var = "--help" ] || [ $var = "-h" ]; then
    echo "Usage:
    deploy.sh [options][branch]
    "

    echo "Options:
    -m, --migrate           Run migration.
    -c, --composer          Run composer install.
    "
    exit
fi

if [ $var = "--migrate" ] || [ $var = "-m" ]; then
    migrate=true
fi

if [ $var = "--composer" ] || [ $var = "-c" ]; then
    composer=true
fi

branch=$var
done

remote_repo='git@gitlab.wmlx345.net:WuMingCodeBase/DomainGuard.git'

# Set build branch default develop

if [[ -z "$branch" ]]; then
    echo "Please specify the branch to deploy."
    echo "Run 'sh bin/deploy.sh --help' for more information on a command."
    exit
fi

# Check remote branch exists or not
git ls-remote --exit-code ${remote_repo} ${branch}
check_status=$?

if [ $check_status != ${EX_OK} ]; then
    echo >&2 "Given branch [${branch}] does not exists in ${remote_repo}"
    exit ${EX_DATAERR}
fi

git fetch --prune

git branch --list | grep $branch
check_branch=$?

if [[ -z "$check_branch" ]]; then
    git checkout $branch
fi

git checkout $branch

git reset --hard origin/$branch

cd  docker/

if [ $migrate = true ]; then
    docker-compose -f app.yml exec -T workspace php artisan migrate
fi

if [ $composer = true ]; then
    docker-compose -f app.yml exec -T workspace composer install
fi

docker-compose -f app.yml exec -T workspace php artisan view:clear
docker-compose -f app.yml exec -T workspace php artisan config:clear
docker-compose -f app.yml exec -T workspace php artisan opcache:clear
docker-compose -f app.yml exec -T workspace php artisan cache:forget spatie.permission.cache
