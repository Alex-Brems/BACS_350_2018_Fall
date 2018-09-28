<?php

    // Form the DB Connection string
    function subscribers_db_string() {

        $port = '3306';
        $dbname = 'uncobacs_subscribers';
        $db_connect = "mysql:host=localhost:$port;dbname=$dbname";
        return $db_connect

    }


    // Open the database or die
    function subscribers_connect() {

        $username = 'uncobacs_350';
        $password = 'BACS_350';
        $db_connect = subscribers_db_string()

        echo "<h2>DB Connection</h2>" .
            "<p>Connect String:  $db_connect, $username, $password</p>";

        try {
            $db = new PDO($db_connect, $username, $password);
            echo '<p><b>Successful Connection</b></p>';
            return $db
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }

    }

?>
