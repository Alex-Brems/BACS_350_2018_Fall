<?php

    /*
        This code shows how to hook up a logging utility.

        usage:
            $text = "This text message";
            require 'log.php';


        SQL Database table

            // Create table log: date, text
            CREATE TABLE log (
              id int(3) NOT NULL AUTO_INCREMENT,
              date varchar(100)  NOT NULL,
              text varchar(100) NOT NULL,
              PRIMARY KEY (id)
            );

    */

    // Connect to the database
    require_once 'db.php';


    // Create a string for "now"
    $date = date('Y-m-d g:i a');


    // Add database row
    $query = "INSERT INTO log (date, text) VALUES (:date, :text);";

    $statement = $db->prepare($query);

    $statement->bindValue(':date', $date);
    $statement->bindValue(':text', $text);

    $statement->execute();
    $statement->closeCursor();

?>
