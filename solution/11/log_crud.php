<?php
    /*
        This code shows how to hook up a logging utility.

        usage:
            require 'log.php';
            $log->log("index.php")


        SQL Database table

            // Create table log: date, text
            CREATE TABLE log (
              id int(3) NOT NULL AUTO_INCREMENT,
              date varchar(100)  NOT NULL,
              text varchar(100) NOT NULL,
              PRIMARY KEY (id)
            );

    */


    // Add a new record
    function add_log($db, $text) {

        // Show if insert is successful or not
        try {
            
            // Create a string for "now"
            $date = date('Y-m-d g:i a');
            
            // Add database row
            $query = "INSERT INTO log (date, text) VALUES (:date, :text);";
            $statement = $db->prepare($query);
            $statement->bindValue(':date', $date);
            $statement->bindValue(':text', $text);

            $statement->execute();
            $statement->closeCursor();
            return true;
             
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
        
    }


    // Delete all database rows
    function clear_log($db) {
        
        try {
            $query = "DELETE FROM log";
            $statement = $db->prepare($query);
            $row_count = $statement->execute();
            return true;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
        
    }


    // Query for all log
    function query_log ($db) {

        $query = "SELECT * FROM log";
        $statement = $db->prepare($query);
        $statement->execute();
        return $statement->fetchAll();

    }

?>
