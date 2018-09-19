<?php
    
    // Bluehost Database settings

    $host = 'localhost';
    $port = '3306';
    $dbname = 'uncobacs_subscribers';
    $username = 'uncobacs_350';
    $password = 'BACS_350';
    $blue_connect = "mysql:host=$host:$port;dbname=$dbname";
    
    // Select the appropriate connection
    $db_connect = $blue_connect;

?>