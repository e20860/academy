CREATE TABLE galleries (
  id INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  name VARCHAR(255))  NULL  ,
  units_id INTEGER UNSIGNED  NULL  ,
  ord TINYINT UNSIGNED  NULL  ,
  desct TEXT  NULL    ,
PRIMARY KEY(id))
TYPE=InnoDB;



CREATE TABLE units (
  id INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  ord TINYINT UNSIGNED  NULL  ,
  name VARCHAR(30)  NULL  ,
  descr TEXT  NULL  ,
  commander INTEGER UNSIGNED  NULL    ,
PRIMARY KEY(id));



CREATE TABLE menu (
  id INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  name VARCHAR(255)  NULL  ,
  link VARCHAR(255)  NULL  ,
  parent TINYINT UNSIGNED  NULL    ,
PRIMARY KEY(id))
TYPE=InnoDB;



CREATE TABLE locals (
  id INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  country CHAR(10)  NULL  ,
  town VARCHAR(30)  NULL  ,
  crd VARCHAR(255)  NULL    ,
PRIMARY KEY(id))
TYPE=InnoDB;



CREATE TABLE video (
  id INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  ord TINYINT UNSIGNED  NULL  ,
  descr TEXT  NULL  ,
  link VARCHAR(255)  NULL    ,
PRIMARY KEY(id))
TYPE=InnoDB;



CREATE TABLE acv_types (
  id INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  ord TINYINT UNSIGNED  NULL  ,
  name VARCHAR(255)  NULL    ,
PRIMARY KEY(id));



CREATE TABLE cnt_types (
  id INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  name VARCHAR(30)  NULL    ,
PRIMARY KEY(id))
TYPE=InnoDB;



CREATE TABLE gal_imgs (
  id INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  galleries_id INTEGER UNSIGNED  NOT NULL  ,
  img VARCHAR(255)  NULL    ,
PRIMARY KEY(id, galleries_id)  ,
INDEX gal_imgs_FKIndex1(galleries_id),
  FOREIGN KEY(galleries_id)
    REFERENCES galleries(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION)
TYPE=InnoDB;



CREATE TABLE graduates (
  id INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  units_id INTEGER UNSIGNED  NOT NULL  ,
  fam VARCHAR(30)  NULL  ,
  nam VARCHAR(30)  NULL  ,
  sur VARCHAR(30)  NULL  ,
  photo1 VARCHAR(255))  NULL  ,
  photo2 VARCHAR(255))  NULL  ,
  info TEXT  NULL  ,
  rip TINYINT UNSIGNED  NULL  ,
  locals_id INTEGER UNSIGNED  NOT NULL    ,
PRIMARY KEY(id, locals_id)  ,
INDEX graduates_FKIndex1(units_id)  ,
INDEX graduates_FKIndex2(units_id)  ,
INDEX graduates_FKIndex3(locals_id),
  FOREIGN KEY(units_id)
    REFERENCES units(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(units_id)
    REFERENCES units(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(locals_id)
    REFERENCES locals(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION)
TYPE=InnoDB;



CREATE TABLE Users (
  id INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  graduates_locals_id INTEGER UNSIGNED  NOT NULL  ,
  graduates_id INTEGER UNSIGNED  NOT NULL  ,
  login VARCHAR(30)  NOT NULL  ,
  pass VARCHAR(255)  NOT NULL  ,
  rights TINYINT UNSIGNED  NULL DEFAULT 0   ,
PRIMARY KEY(id)  ,
INDEX Users_FKIndex1(graduates_id, graduates_locals_id),
  FOREIGN KEY(graduates_id, graduates_locals_id)
    REFERENCES graduates(id, locals_id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION)
TYPE=InnoDB;



CREATE TABLE achievs (
  id INTEGER UNSIGNED  NOT NULL  ,
  graduates_locals_id INTEGER UNSIGNED  NOT NULL  ,
  graduates_id INTEGER UNSIGNED  NOT NULL  ,
  descr VARCHAR(255)  NULL   AUTO_INCREMENT,
  acv_types_id INTEGER UNSIGNED  NULL    ,
PRIMARY KEY(id)  ,
INDEX achievs_FKIndex1(graduates_id, graduates_locals_id)  ,
INDEX achievs_FKIndex2(acv_types_id),
  FOREIGN KEY(graduates_id, graduates_locals_id)
    REFERENCES graduates(id, locals_id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(acv_types_id)
    REFERENCES acv_types(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION)
TYPE=InnoDB;



CREATE TABLE contacts (
  id INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  graduates_locals_id INTEGER UNSIGNED  NOT NULL  ,
  cnt_types_id INTEGER UNSIGNED  NOT NULL  ,
  graduates_id INTEGER UNSIGNED  NOT NULL  ,
  cont_info VARCHAR(255))  NULL    ,
PRIMARY KEY(id)  ,
INDEX contacts_FKIndex1(graduates_id, graduates_locals_id)  ,
INDEX contacts_FKIndex2(cnt_types_id),
  FOREIGN KEY(graduates_id, graduates_locals_id)
    REFERENCES graduates(id, locals_id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(cnt_types_id)
    REFERENCES cnt_types(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);




