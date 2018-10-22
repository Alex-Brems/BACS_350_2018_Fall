<?php

    // Connect to the database
    require_once 'db.php';


    echo '<h2>Update Test User</h2>';


    // Data for record
    $name = 'Test User';
    $email = 'tester@gmail.com';


    // Modify database row
    $query = "UPDATE subscribers SET name = :name, email = :email WHERE id = 1";

    $statement = $db->prepare($query);

    $statement->bindValue(':name', $name);
    $statement->bindValue(':email', $email);

    $statement->execute();
    $statement->closeCursor();


    // Display subscriber records
    require 'select.php';

?>
