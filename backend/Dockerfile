FROM php:7.4-apache

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
RUN sed -ri -e 's!<VirtualHost \*:80>!<VirtualHost \*:8080>!g' /etc/apache2/sites-available/000-default.conf
RUN sed -ri -e 's!Listen 80!Listen 8080!g' /etc/apache2/ports.conf
RUN groupadd -g 1000 -o 1000
RUN useradd -m -u 1000 -g 1000 -o -s /bin/bash apache
WORKDIR /var/www/html

ENV APACHE_RUN_USER apache
ENV APACHE_RUN_GROUP 1000

COPY app/ /var/www/html/
RUN chown -R 1000:1000 ./*

