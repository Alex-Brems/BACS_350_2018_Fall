--
-- Create table books: name, address, phone
--

CREATE TABLE contacts (
  id int(3) NOT NULL AUTO_INCREMENT,
  name     varchar(100)  NOT NULL,
  address  varchar(100)  NOT NULL,
  phone    varchar(20) NOT NULL,
  PRIMARY KEY (id)
);

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `address`, `phone`) VALUES
(1, 'Bill Gates', 'Seattle', 'Richest guy in the world');

