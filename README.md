# Mynet-Case

## Installation
1. Clone Project
> `git clone https://github.com/sezayozturk/mynet-case.git`

2. Starting Docker Containers
> `docker-compose up -d`

3. Open PhpMyAdmin
> `localhost:8080`
> 
> Create Database: **mynet**

4. You can see the working containers with `docker ps`
```
CONTAINER ID   IMAGE                          COMMAND                  CREATED       STATUS         PORTS                               NAMES
106b25337ece   mysql:5.7                      "docker-entrypoint.s…"   5 hours ago   Up 7 minutes   0.0.0.0:3306->3306/tcp, 33060/tcp   mynet-mysql-1
aea242715c32   nginx:1.13.8                   "nginx -g 'daemon of…"   5 hours ago   Up 7 minutes   0.0.0.0:80->80/tcp                  mynet-nginx-1
8481fe4ceefc   mynet_php8                     "docker-php-entrypoi…"   5 hours ago   Up 7 minutes   0.0.0.0:9001->9000/tcp              mynet-php8-1
7495641f19f7   redis:latest                   "docker-entrypoint.s…"   6 days ago    Up 8 minutes   0.0.0.0:6379->6379/tcp              mynet-redis-1
6417b15c9305   phpmyadmin/phpmyadmin:latest   "/docker-entrypoint.…"   6 days ago    Up 8 minutes   0.0.0.0:8080->80/tcp                mynet-phpmyadmin-1
```

5. Connect mynet_php8
> `docker exec -it MYNETPHP8 CONTAINER ID bash`
> 
> `cd project1`

6. Run Command
> `composer install` 
> 
> `php artisan migrate --seed`

7. Open Project
> [localhost](http://localhost)
> 
> [localhost/admin](http://localhost/admin)
> 
> [localhost/admin/person](http://localhost/admin/person)


