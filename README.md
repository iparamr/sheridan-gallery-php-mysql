# Art Gallery
Sheridan College Class Project, 2007 `Application Development` `Semester 1`
```
**********************************************************
**********************************************************
******      Param Randhawa                          ******
******      Application Development: Project        ******
******      December 7, 2007                        ******
**********************************************************
**********************************************************
```
```
	Student: Param Randhawa
	For: Ian Wood and Andrew Smyk
	Date: December 7, 2007
	-----------------------------------------------------
```

- The PHP project is in this repo and I have made a backup of the database in art_gallery.sql
	
- The project can be viewed at http://oa-s139-07.sheridanc.on.ca/myProj/index.html

- For the admin section of the site you will have to use the Username: admin, Password: sheridan	

## Prerequisties:
- Docker 
- MySQL 
- phpMyAdmin

## MYSQL:
MySQL is an open-source relational database management system. 

## PhpMyAdmin:
phpMyAdmin is a free and open source administration tool for MySQL and MariaDB. 
As a portable web application written primarily in PHP

## Pull MySQL Docker image 

```
docker pull mysql:lts
```
```
docker run --name dev-mysql -e MYSQL_ROOT_PASSWORD=dev123 -d mysql:lts
```
## After MySQL server is running let us pull the phpMyAdmin image and create the container

```
docker pull phpmyadmin/phpmyadmin:latest
```
```
docker run --name dev-phpmyadmin -d --link dev-mysql:db -p 8081:80 phpmyadmin/phpmyadmin:latest
```

## Access phpMyAdmin http://localhost:8081/

- user: root
- pass: dev123

## Create database within phpMyAdmin
- create database names art_gallery
- import data dump

## Copy art-gallery php project files to the container

```
docker cp art-gallery/. dev-phpmyadmin:/var/www/html/art-gallery/
```

## Get MySQL server IP Address to setup DB connection within PHP application

```
docker inspect dev-mysql | grep IPAddress
```

## Access using CLI

```
docker exec -it dev-mysql bash

mysql -u root -p

select now();
select current_timestamp();
select current_date,curdate(),current_date();
```
