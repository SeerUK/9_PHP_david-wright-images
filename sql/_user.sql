-- Platform: keira

CREATE DATABASE IF NOT EXISTS dwright
  CHARACTER SET = utf8;


USE dwright;


-- Table definitions:

CREATE TABLE User (
	intUserId int UNSIGNED NOT NULL AUTO_INCREMENT,
	strUserName varchar(25) NOT NULL,
	strPassword varchar(128) NOT NULL,
	strEmail varchar(255) NOT NULL,
	bolActive boolean NOT NULL,

	PRIMARY KEY (intUserId),
	UNIQUE KEY (strUserName),
	UNIQUE KEY (strEmail)
)
ENGINE=InnoDB,
DEFAULT CHARSET utf8;
