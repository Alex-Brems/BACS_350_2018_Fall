<?php
        
    include "header.php";

    // Connect to the database
    require_once 'db.php';

?>

<h2>Log Added!</h2>
<p>
    Name: <?php echo $_POST["name"]; ?>
    <br>
    Email: <?php echo $_POST["email"]; ?>
</p>

<?php

    // Add new record
    $name = $_POST["name"];
    $email = $_POST["email"];


    // Add database row
    $query = "INSERT INTO proj16subs (name, email) VALUES (:name, :email);";

    $statement = $db->prepare($query);

    $statement->bindValue(':name', $name);
    $statement->bindValue(':email', $email);

    $statement->execute();
    $statement->closeCursor();


    // Display subscriber records
    require 'select.php';

?>

<a href="index.php">Back to the Subscribers Index</a>