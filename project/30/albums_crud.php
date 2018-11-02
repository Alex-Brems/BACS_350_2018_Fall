<?php

    // Add a new record
    function add_album($db, $artist, $title, $art, $purchase, $desc, $review) {

        // Show if insert is successful or not
        try {

            // Add database row
            $query = "INSERT INTO Album (artist, name, artwork, purchase_url, description, review) VALUES (:artist, :name, :artwork, :purchase_url, :description, :review);";
            $statement = $db->prepare($query);
            $statement->bindValue(':artist', $artist);
            $statement->bindValue(':name', $title);
            $statement->bindValue(':artwork', $art);
            $statement->bindValue(':purchase_url', $purchase);
            $statement->bindValue(':description', $desc);
            $statement->bindValue(':review', $review);
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
    function clear_albums($db) {
        
        try {
            $query = "DELETE FROM Album";
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
    function query_albums ($db) {

        $query = "SELECT * FROM Album";
        $statement = $db->prepare($query);
        $statement->execute();
        return $statement->fetchAll();

    }

?>
