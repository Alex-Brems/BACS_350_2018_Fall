<?php

    // Connect to the database
    require_once 'subscriber.php';


    // Pick out the inputs
    $name  = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email');


    // Add record
    if ($subscribers->add ($name, $email)) {
        header("Location: before.php");
    }

?>
