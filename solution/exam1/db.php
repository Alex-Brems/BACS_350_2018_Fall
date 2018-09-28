<?php

    // Form the DB Connection string and connect to database


    // Bluehost Database settings
    $host = 'localhost';
    $port = '3306';
    $dbname = 'uncobacs_contacts';
    $username = 'uncobacs_350';
    $password = 'BACS_350';
    $db_connect = "mysql:host=$host:$port;dbname=$dbname";


    // Open the database or die
    try {
        $db = new PDO($db_connect, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>Error: $error_message</p>";
        die();
    }

?>
