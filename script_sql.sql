CREATE DATABASE IF NOT EXISTS WIM CHARSET utf8mb4;
USE WIM;

CREATE TABLE IF NOT EXISTS `Role` (
id_role INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
type_role VARCHAR(50) NOT NULL UNIQUE
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `user` (
id_user INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
pseudo VARCHAR(50) NOT NULL UNIQUE,
email VARCHAR(50) NOT NULL UNIQUE,
`password` VARCHAR(100) NOT NULL,
avatar VARCHAR(500),
registration_date DATE NOT NULL,
id_role INT NOT NULL DEFAULT '1',
CONSTRAINT fk_user_role
FOREIGN KEY (id_role)
REFERENCES `role`(id_role)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS to_befriend (
id_user_recipient INT NOT NULL,
id_user_sender INT NOT NULL,
friend_status VARCHAR(50),
date_sent DATE,
PRIMARY KEY (id_user_recipient, id_user_sender),
CONSTRAINT fk_befriend_recipient
FOREIGN KEY (id_user_recipient)
REFERENCES `user`(id_user),
CONSTRAINT fk_befriend_sender
FOREIGN KEY (id_user_sender)
REFERENCES `user`(id_user)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS acces_type (
id_acces_type INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
type_acces VARCHAR(50) NOT NULL UNIQUE
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS photo (
id_photo INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
url_photo VARCHAR(500)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS album (
id_album INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
title VARCHAR(50) NOT NULL,
date_album DATE NOT NULL DEFAULT (CURRENT_DATE),
id_acces_type INT NOT NULL DEFAULT '1',
CONSTRAINT fk_album_acces
FOREIGN KEY (id_acces_type)
REFERENCES acces_type(id_acces_type)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS to_create (
id_user INT,
id_album INT,
PRIMARY KEY (id_user, id_album),
CONSTRAINT fk_to_create_user
FOREIGN KEY (id_user)
REFERENCES `user`(id_user),
CONSTRAINT fk_to_create_album
FOREIGN KEY (id_album)
REFERENCES album(id_album)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS report_type (
id_report_type INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
type_report VARCHAR(50) NOT NULL UNIQUE
)ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS report (
id_report INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
date_report DATE,
`status` BOOLEAN NOT NULL ,
id_photo INT,
id_user INT,
CONSTRAINT fk_report_photo
FOREIGN KEY (id_photo)
REFERENCES photo(id_photo),
CONSTRAINT fk_report_user
FOREIGN KEY (id_user)
REFERENCES `user`(id_user)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS to_contain (
id_album INT,
id_photo INT,
PRIMARY KEY (id_album, id_photo),
CONSTRAINT fk_to_contain_album
FOREIGN KEY (id_album)
REFERENCES album(id_album),
CONSTRAINT fk_to_contain_photo
FOREIGN KEY (id_photo)
REFERENCES photo(id_photo)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS to_classify (
id_report INT,
id_report_type INT,
PRIMARY KEY (id_report, id_report_type),
CONSTRAINT fk_to_classify_report
FOREIGN KEY (id_report)
REFERENCES report(id_report),
CONSTRAINT fk_to_classify_type
FOREIGN KEY (id_report_type)
REFERENCES report_type(id_report_type)
)ENGINE=InnoDB;