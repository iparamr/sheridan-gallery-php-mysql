# Art Gallery
Class project `Application Development` `Semester 1`

## Prerequisties:
- Docker 
- MySQL 
- phpMyAdmin

## MYSQL:
MySQL is an open-source relational database management system. 

## PhpMyAdmin:
phpMyAdmin is a free and open source administration tool for MySQL and MariaDB. 
As a portable web application written primarily in PHP

## pull docker image 

```
docker pull mysql:lts
```
```
docker run --name dev-mysql -e MYSQL_ROOT_PASSWORD=dev123 -d mysql:lts
```
## now mysql server is running now let us pull the phpmyadmin and create the container

```
docker pull phpmyadmin/phpmyadmin:latest
```
```
docker run --name dev-phpmyadmin -d --link dev-mysql:db -p 8081:80 phpmyadmin/phpmyadmin:latest
```

## Access phpMyAdmin http://localhost:8081/

- user: root
- pass: dev123

## create database
- create database names art_callery
- import data dump

## copy art-gallery php project files

```
docker cp art-gallery/. dev-phpmyadmin:/var/www/html/art-gallery/
```
