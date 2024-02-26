FROM php:8.3-apache
WORKDIR /var/www/html
COPY app/ /var/www/html
COPY index.php index.php
EXPOSE 80
