<?php

    // Start the page
    $page_title = 'BACS 350 - Project #6 - Database Connect';
    require_once '../../header.php';

    
    // Form the DB Connection string
    $port = '3306';
    $dbname = 'uncobacs_subscribers';
    $username = 'uncobacs_350';
    $password = 'BACS_350';
    $db_connect = "mysql:host=localhost:$port;dbname=$dbname";
    

    // Open the database or die
    echo "<h2>How to Connect to your Database</h2>" .
        "<p>Connect String:  $db_connect, $username, $password</p>";

    try {
        $db = new PDO($db_connect, $username, $password);
        echo '<p><b>Successful Connection</b></p>';
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>Error: $error_message</p>";
    }


    // End the page
    require_once '../../footer.php';

?>
