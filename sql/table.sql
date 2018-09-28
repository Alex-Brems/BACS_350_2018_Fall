// Create table subscribers: name, email

CREATE TABLE subscribers (
  id int(3) NOT NULL AUTO_INCREMENT,
  name varchar(100)  NOT NULL,
  email varchar(100) NOT NULL,
  PRIMARY KEY (id)
);


// Create table log: date, text

CREATE TABLE log (
  id int(3) NOT NULL AUTO_INCREMENT,
  date varchar(100)  NOT NULL,
  text varchar(100) NOT NULL,
  PRIMARY KEY (id)
);


// Create table books: title, author, text

CREATE TABLE books (
  id int(3) NOT NULL AUTO_INCREMENT,
  title varchar(200)  NOT NULL,
  author varchar(100) NOT NULL,  
  summary varchar(1000) NOT NULL,
  PRIMARY KEY (id)
);