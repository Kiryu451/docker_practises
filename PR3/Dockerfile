FROM php:8.0-apache
RUN apt-get update && apt-get install -y apache2-utils libaprutil1-dbd-mysql
RUN a2enmod authn_dbd
RUN docker-php-ext-install mysqli
