

CREATE DATABASE tz CHARACTER SET utf8 COLLATE utf8_general_ci;
GRANT ALL PRIVILEGES ON tz.* TO tz@localhost IDENTIFIED BY 'passme' WITH GRANT OPTION;
USE tz;

CREATE TABLE user ( \
  id int(11) NOT NULL AUTO_INCREMENT, \
  name varchar(100) NOT NULL, \
  pass text, \
  primary key (id) \
) engine=innodb;
