--
-- Create table subscribers: name, email
--

CREATE TABLE subscribers (
  id int(3) NOT NULL AUTO_INCREMENT,
  name varchar(100)  NOT NULL,
  email varchar(100) NOT NULL,
  PRIMARY KEY (id)
);
