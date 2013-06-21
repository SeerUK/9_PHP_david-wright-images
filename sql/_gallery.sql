-- Platform: keira

CREATE DATABASE IF NOT EXISTS dwright
  CHARACTER SET = utf8;


USE dwright;


-- Table definitions:


CREATE TABLE IF NOT EXISTS Gallery (
    intGalleryId int UNSIGNED NOT NULL AUTO_INCREMENT,
    strGalleryName varchar(100) NOT NULL,
    strGalleryDesc varchar(5000) NOT NULL,
    dtmPublished datetime NOT NULL,
    stmTimestamp timestamp,

    PRIMARY KEY (intGalleryId)
)
ENGINE=InnoDB
COMMENT="Portfolio galleries";


CREATE TABLE IF NOT EXISTS GalleryImage (
    intGalleryImageId int UNSIGNED NOT NULL AUTO_INCREMENT,
    strGalleryImageName varchar(100) NOT NULL,
    strGalleryImageDesc varchar(5000) NOT NULL,
    intGalleryId int UNSIGNED NOT NULL,
    strPath varchar(255) NOT NULL,
    dtmPublished datetime NOT NULL,
    stmTimestamp timestamp,

    PRIMARY KEY (intGalleryImageId),
    FOREIGN KEY (intGalleryId) REFERENCES Gallery (intGalleryId) ON UPDATE CASCADE ON DELETE CASCADE
)
ENGINE=InnoDB
COMMENT="Portfolio gallery images";
