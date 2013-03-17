-- Platform: keira

CREATE DATABASE IF NOT EXISTS dwright
  CHARACTER SET = utf8;

USE dwright;


-- Table definitions:

CREATE TABLE IF NOT EXISTS GalleryCategory (
	intGalleryCategoryId int UNSIGNED NOT NULL AUTO_INCREMENT,
	strGalleryCategoryName varchar(50) NOT NULL,
	strGalleryCategoryDesc varchar(255) NOT NULL,
	stmTimestamp timestamp,

	PRIMARY KEY (intGalleryCategoryId)
)
ENGINE=InnoDB
COMMENT="Portfolio gallery categories";


CREATE TABLE IF NOT EXISTS Gallery (
	intGalleryId int UNSIGNED NOT NULL AUTO_INCREMENT,
	strGalleryName varchar(50) NOT NULL,
	strGalleryDesc varchar(255) NOT NULL,
	intGalleryCategoryId int UNSIGNED NOT NULL,
	dtmPublished datetime NOT NULL,
	stmTimestamp timestamp,

	PRIMARY KEY (intGalleryId),
	FOREIGN KEY (intGalleryCategoryId) REFERENCES GalleryCategory (intGalleryCategoryId) ON UPDATE CASCADE ON DELETE CASCADE
)
ENGINE=InnoDB
COMMENT="Portfolio galleries";


CREATE TABLE IF NOT EXISTS GalleryImage (
	intGalleryImageId int UNSIGNED NOT NULL AUTO_INCREMENT,
	strGalleryImageName varchar(50) NOT NULL,
	strGalleryImageDesc varchar(255) NOT NULL,
	intGalleryId int UNSIGNED NOT NULL,
	dtmPublished datetime NOT NULL,
	stmTimestamp timestamp,

	PRIMARY KEY (intGalleryImageId),
	FOREIGN KEY (intGalleryId) REFERENCES Gallery (intGalleryId) ON UPDATE CASCADE ON DELETE CASCADE
)
ENGINE=InnoDB
COMMENT="Portfolio gallery images";