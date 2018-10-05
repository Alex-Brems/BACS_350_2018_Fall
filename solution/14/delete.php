<?php

 // Connect to the database
    require_once 'subscriber_db.php';
    $db = subscribers_connect();


    // Delete all records
    if (clear_subscribers ($db, 'index.php')) {
        header("Location: index.php");
    }

?>
