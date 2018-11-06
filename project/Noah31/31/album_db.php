<?php

/* --------------------------------------      

SQL for Table

-- Create table subscribers: id, name, email --

CREATE TABLE albums (
  id int(3) NOT NULL AUTO_INCREMENT,
  album varchar(255)  NOT NULL,
  artist varchar(255) NOT NULL,
  artworkLink varchar(255) NOT NULL,
  purchaseLink varchar(255) NOT NULL,
  description varchar(255) NOT NULL,
  review varchar(255) NOT NULL,
  PRIMARY KEY (id)
);

-------------------------------------- */

    // Connect to the remote database
    function remote_connect() {

        $port = '3306';
        $dbname = 'albums';
        $db_connect = "mysql:host=localhost:$port;dbname=$dbname";
        $username = 'root';
        $password = 'splatterdodge';
        return db_connect($db_connect, $username, $password);

    }


    // Local Host Database settings
    function local_connect() {

        $host = 'localhost';
        $dbname = 'albums';
        $username = 'root';
        $password = 'splatterdodge';
        $db_connect = "mysql:host=$host;dbname=$dbname";
        return db_connect($db_connect, $username, $password);

    }


    // Open the database or die
    function db_connect($db_connect, $username, $password) {
        
//        echo "<h2>DB Connection</h2><p>Connect String:  $db_connect, $username, $password</p>";
        try {
            $db = new PDO($db_connect, $username, $password);
//             echo '<p><b>Successful Connection</b></p>';
            return $db;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }

    }


    // Open the database or die
    function albums_connect() {
        
        $local = ($_SERVER['SERVER_NAME'] == 'localhost');
        if ($local) {
            return local_connect();
        } 
        else {
            return remote_connect();
        }
        
    }

?>
