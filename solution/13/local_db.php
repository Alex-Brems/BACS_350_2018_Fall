<?php
    
    // Local Host Database settings

    // local
    $host = 'localhost';
    $dbname = 'books';
    $username = 'root';
    $password = '';
    $local_connect = "mysql:host=$host;dbname=$dbname";

    // Select the appropriate connection
    $db_connect = $local_connect;

?>
