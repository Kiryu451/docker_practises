FROM php:8.0-apache
RUN apt-get update
RUN a2enmod authn_dbd # подключаем модуль для аутентификации юзеров с помощью поиска их в sql таблицах
RUN apt-get install -y apache2-utils libaprutil1-dbd-mysql # содержит драйвер базы данных MySQL/mariadb
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install pdo pdo_mysql