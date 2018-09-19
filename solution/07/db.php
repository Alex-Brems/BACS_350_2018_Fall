<?php

    // Form the DB Connection string
    $port = '3306';
    $dbname = 'uncobacs_subscribers';
    $db_connect = "mysql:host=localhost:$port;dbname=$dbname";
    $username = 'uncobacs_350';
    $password = 'BACS_350';

//    echo "<h2>DB Connection</h2>" .
//        "<p>Connect String:  $db_connect, $username, $password</p>";


    // Open the database or die
    try {
        $db = new PDO($db_connect, $username, $password);
//        echo '<p><b>Successful Connection</b></p>';
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>Error: $error_message</p>";
        die();
    }

?>
