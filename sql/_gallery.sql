-- Platform: keira

CREATE DATABASE IF NOT EXISTS dwright
  CHARACTER SET = utf8;

USE dwright;


-- Table definitions:

CREATE TABLE IF NOT EXISTS Gallery (
	intGalleryId int UNSIGNED NOT NULL AUTO_INCREMENT,
	strGalleryName varchar(50) NOT NULL,
	strGalleryDesc varchar(255) NOT NULL,
	dtmPublished datetime NOT NULL,
	stmTimestamp timestamp,

	PRIMARY KEY (intGalleryId)
)
ENGINE=InnoDB
COMMENT="Portfolio galleries";


CREATE TABLE IF NOT EXISTS GalleryCategory (
	intGalleryCategoryId int UNSIGNED NOT NULL AUTO_INCREMENT,
	strGalleryCategoryName varchar(50) NOT NULL,
	strGalleryCategoryDesc varchar(255) NOT NULL,
	stmTimestamp timestamp,

	PRIMARY KEY (intGalleryCategoryId)
)
ENGINE=InnoDB
COMMENT="Portfolio gallery categories";


CREATE TABLE IF NOT EXISTS GalleryCategoryMap (
	intGalleryId int UNSIGNED NOT NULL,
	intGalleryCategoryId int UNSIGNED NOT NULL,
	stmTimestamp timestamp,

	PRIMARY KEY (intGalleryId, intGalleryCategoryId),
	FOREIGN KEY (intGalleryId) REFERENCES Gallery (intGalleryId) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (intGalleryCategoryId) REFERENCES GalleryCategory (intGalleryCategoryId) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE=InnoDB
COMMENT="Portfolio gallery category map";


CREATE TABLE IF NOT EXISTS GalleryImage (
	intGalleryImageId int UNSIGNED NOT NULL AUTO_INCREMENT,
	strGalleryImageName varchar(50) NOT NULL,
	strGalleryImageDesc varchar(255) NOT NULL,
	dtmPublished datetime NOT NULL,
	stmTimestamp timestamp,

	PRIMARY KEY (intGalleryImageId)
)
ENGINE=InnoDB
COMMENT="Portfolio gallery category map";


CREATE TABLE IF NOT EXISTS GalleryImageMap (
	intGalleryId int UNSIGNED NOT NULL,
	intGalleryImageId int UNSIGNED NOT NULL,
	stmTimestamp timestamp,

	PRIMARY KEY (intGalleryId, intGalleryImageId),
	FOREIGN KEY (intGalleryId) REFERENCES Gallery (intGalleryId) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (intGalleryImageId) REFERENCES GalleryImage (intGalleryImageId) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE=InnoDB
COMMENT="Portfolio gallery category map";
