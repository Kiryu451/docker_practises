CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT, UPDATE, INSERT ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE appDB;
SET NAMES utf8;

CREATE TABLE IF NOT EXISTS authors
(
    id          int NOT NULL AUTO_INCREMENT,
    name        varchar(30),
    surName     varchar(30),
    age         int,
    primary key (id)
);

CREATE TABLE IF NOT EXISTS books
(
    id          int NOT NULL AUTO_INCREMENT,
    title       varchar(90),
    content     LONGTEXT,
    author      varchar(60),
    primary key (id)
);

CREATE TABLE IF NOT EXISTS auth (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    login VARCHAR(20) NOT NULL UNIQUE,
    password VARCHAR(40) NOT NULL,
    PRIMARY KEY(ID)
);

INSERT INTO auth (login, password)
VALUES ('login', '{SHA}QL0AFWMIX8NRZTKeof9cXsvbvu8=');

INSERT INTO authors (name, surName, age)
VALUES
    ('Миура', 'Кэнтаро', 54),
    ('Карл', ' Маркс', 50),
    ('Джон', ' Толкин', 64),
    ('Уильям', 'Шекспир', 25),
    ('Александр', 'Пушкин', 33);

INSERT INTO books (title, content, author)
VALUES
    ('Капитанская дочка',
    'Был бы гвардии он завтра ж капитан. Того не надобно; пусть в армии послужит. Изрядно сказано! пускай его потужит... Да кто его отец?',
    'Александр Пушкин'),
    ('Властелин колец. Братство Кольца',
    'Три кольца премудрым эльфам —
    для добра их гордого,
    Семь колец пещерным гномам —
    для труда их горного,
    Девять — людям Средиземья —
    для служенья черного
    И бесстрашия в сраженьях смертоносно твердого,
    А Одно — всесильное — Властелину Мордора,
    Чтоб разъединить их всех, чтоб лишить их воли
    И объединить их всех в их земной юдоли
    Под владычеством всесильным Властелина Мордора.',
    'Джон Толкин'),
    ('Капитал',
    'Труд, первый том которого я предлагаю вниманию публики, составляет продолжение опубликованного в 1859 г. моего сочинения «К критике политической экономии». Длительный перерыв между началом и продолжением вызван многолетней болезнью, которая всё снова и снова прерывала мою работу.',
    'Карл Маркс'),
    ('Берсерк',
    'Что вершит судьбу человечества в этом мире? Некое незримое существо или закон, подобно Длани Господней парящей над миром? По крайне мере истинно то, что человек не властен даже над своей волей. ',
    'Кэнтаро Миура');
