--
-- Create table books: title, author, text
--

CREATE TABLE books (
  id int(3) NOT NULL AUTO_INCREMENT,
  title   varchar(200)  NOT NULL,
  author  varchar(100)  NOT NULL,  
  summary varchar(1000) NOT NULL,
  PRIMARY KEY (id)
);

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `author`, `title`, `summary`) VALUES
(0, 'Charles Dickens', 'Tale of Two Cities', 'French revolution');

