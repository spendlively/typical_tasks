

create database isolation character set utf8 collate utf8_general_ci;

GRANT ALL PRIVILEGES ON *.* TO isolation@'localhost' IDENTIFIED BY 'isolation' WITH GRANT OPTION;

use isolation;

create table users( \
  id int(11), \
  name varchar(256), \
  age int(11) \
) engine=innodb;

insert into users (id, name, age) values \
(1, 'Ivan', 12), \
(2, 'Yulia', 33), \
(3, 'Konstantin', 31), \
(4, 'Juletta', 27), \
(5, 'Zoya', 55);