-- Active: 1699026817311@@localhost@3306@automaty
CREATE DATABASE automaty COLLATE utf8_czech_ci;


CREATE TABLE uzivatel (
	jmeno varchar(100) PRIMARY KEY,
	heslo text,
	castka DOUBLE
);

CREATE TABLE procenta (
	id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	vyhra INT UNSIGNED,
	prohra INT UNSIGNED
);

ALTER TABLE procenta ADD COLUMN jackpot INT UNSIGNED



