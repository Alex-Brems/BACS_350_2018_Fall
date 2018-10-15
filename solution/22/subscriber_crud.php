<?php

    // Add a new record
    function add_subscriber($db, $name, $email) {

        // Show if insert is successful or not
        try {

            // Add database row
            $query = "INSERT INTO subscribers (name, email) VALUES (:name, :email);";
            $statement = $db->prepare($query);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':email', $email);
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
    function clear_subscribers($db) {
        
        try {
            $query = "DELETE FROM subscribers";
            $statement = $db->prepare($query);
            $row_count = $statement->execute();
            return true;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
        
    }


    // Query for all subscribers
    function query_subscribers ($db) {

        $query = "SELECT * FROM subscribers";
        $statement = $db->prepare($query);
        $statement->execute();
        return $statement->fetchAll();

    }

?>
