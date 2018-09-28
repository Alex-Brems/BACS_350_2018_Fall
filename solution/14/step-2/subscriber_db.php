<?php

    // Connect to the remote database
    function remote_connect() {

        $port = '3306';
        $dbname = 'uncobacs_subscribers';
        $db_connect = "mysql:host=localhost:$port;dbname=$dbname";
        $username = 'uncobacs_350';
        $password = 'BACS_350';
        return subscribers_connect($db_connect, $username, $password);

    }


    // Local Host Database settings
    function local_connect() {

        $host = 'localhost';
        $dbname = 'subscribers';
        $username = 'root';
        $password = '';
        $db_connect = "mysql:host=$host;dbname=$dbname";
        return subscribers_connect($db_connect, $username, $password);

    }


    // Open the database or die
    function subscribers_connect($db_connect, $username, $password) {

        echo "<h2>DB Connection</h2><p>Connect String:  $db_connect, $username, $password</p>";

        try {
            $db = new PDO($db_connect, $username, $password);
            echo '<p><b>Successful Connection</b></p>';
            return $db;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }

    }

?>
