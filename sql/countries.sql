CREATE TABLE country (code CHAR(2) NOT NULL PRIMARY KEY,
name CHAR(52) NOT NULL,
population INT(11) NOT NULL DEFAULT 0) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `country`(`code`,`name`,`population`) VALUES ('AU','Australia',24016400);
INSERT INTO `country`(`code`,`name`,`population`) VALUES ('BR','Brazil',205722000);
INSERT INTO `country`(`code`,`name`,`population`) VALUES ('CA','Canada',35985751);
INSERT INTO `country`(`code`,`name`,`population`) VALUES ('CN','China',1375210000);
INSERT INTO `country`(`code`,`name`,`population`) VALUES ('DE','Germany',81459000);
INSERT INTO `country`(`code`,`name`,`population`) VALUES ('FR','France',64513242);
INSERT INTO `country`(`code`,`name`,`population`) VALUES ('GB','United Kingdom',65097000);
INSERT INTO `country`(`code`,`name`,`population`) VALUES ('IN','India',1285400000);
INSERT INTO `country`(`code`,`name`,`population`) VALUES ('RU','Russia',146519759);
INSERT INTO `country`(`code`,`name`,`population`) VALUES ('US','United States',322976000);