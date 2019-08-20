## Laravel Wather

### System Version

1. Laravel 5.8
2. MySQL 5.7
3. PHP 7.2
4. Redis latest
5. Nginx alpine

### System require

1. docker 19.03.1
2. docker compose 1.24.1
3. yarn 1.13.0

### Set env

- develop
```bash
ln -s .env.example .env
cd docker
ln -s .env-dev .env
```

- stage
```bash
ln -s .env.stage .env
cd docker
ln -s .env-stage .env
```

- production
```bash
ln -s .env.production .env
cd docker
ln -s .env-production .env
```

### Start docker

```bash
cd docker
docker-compose up -d
```

### Build env

- composet install

```bash
docker-compose exec workspace composer install
```

- create migrate table & run migrate

```bash
docker-compose exec workspace php artisan migrate:install
docker-compose exec workspace php artisan migrate
```
