<?php

    // Connect to the database
    require_once 'db.php';


    // Show if insert is successful or not
    try {
        
        // Add database row
        $query = "INSERT INTO subscribers (name, email) VALUES (:name, :email);";

        $statement = $db->prepare($query);

        $statement->bindValue(':name', $name);
        $statement->bindValue(':email', $email);

        $statement->execute();
        $statement->closeCursor();
        
        echo '<p><b>Insert successful</b></p>';
        
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>Error: $error_message</p>";
        die();
    }

?>
