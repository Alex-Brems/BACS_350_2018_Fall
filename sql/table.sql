CREATE TABLE subscribers (
  id small_int(3) NOT NULL AUTO_INCREMENT,
  name varchar(100)  NOT NULL,
  email varchar(100) NOT NULL,
  PRIMARY KEY (id),
);

CREATE TABLE log (
  id small_int(3) NOT NULL AUTO_INCREMENT,
  date varchar(100)  NOT NULL,
  text varchar(100) NOT NULL,
  PRIMARY KEY (id),
);