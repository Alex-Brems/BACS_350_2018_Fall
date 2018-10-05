<?php

    // Connect to the database
    require_once 'db.php';


    // Pick out the inputs
    $name    = filter_input(INPUT_GET, 'name');
    $address = filter_input(INPUT_GET, 'address');
    $phone   = filter_input(INPUT_GET, 'phone');


    // Show if insert is successful or not
    try {
        
        // Add database row
        $query = "INSERT INTO books (name, address, phone) VALUES (:name, :address, :phone);";

        $statement = $db->prepare($query);

        $statement->bindValue(':name',    $name);
        $statement->bindValue(':address', $address);
        $statement->bindValue(':phone',   $phone);

        $statement->execute();
        $statement->closeCursor();
        
        header('Location: index.php');

    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>Error: $error_message</p>";
        die();
    }

?>
