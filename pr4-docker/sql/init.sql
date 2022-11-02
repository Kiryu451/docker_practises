CREATE DATABASE IF NOT EXISTS appDB2;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT, UPDATE, INSERT, DELETE ON appDB2.* TO 'user'@'%';
FLUSH PRIVILEGES;

CREATE TABLE IF NOT EXISTS authors
(
    id          int NOT NULL AUTO_INCREMENT,
    name        varchar(191),
    surName     varchar(200),
    age         int,
    primary key (id)
);

CREATE TABLE IF NOT EXISTS books
(
    id          int NOT NULL AUTO_INCREMENT,
    title       varchar(191),
    content     varchar(500),
    author      varchar(191),
    primary key (id)
);

CREATE TABLE IF NOT EXISTS admins
(
    userName    varchar(191) not null,
    passwd      varchar(191),
    primary key (userName)
);
INSERT INTO admins VALUE ('Dudli', '{SHA}QL0AFWMIX8NRZTKeof9cXsvbvu8=');
