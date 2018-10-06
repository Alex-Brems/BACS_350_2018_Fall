<?php
    
    // Prevent caching
    header("Pragma: no-cache");
    header("Expires: 0");
    header("Cache-Control: no-store, no-cache, must-revalidate");


    // Connect to the database
    require_once 'notes.php';


    // Pick out the inputs
    $title  = filter_input(INPUT_POST, 'title');
    $date = filter_input(INPUT_POST, 'date');
    $body = filter_input(INPUT_POST, 'body');


    // Add record
    if ($notes->add ($title, $date, $body)) {
//      echo '<p><b>Insert successful</b>&nbsp;<a href="index.php">notes</a></p>';
//      $this->query();
        header("Location: index.php");
    }

?>

