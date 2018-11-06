<?php
    
    // Prevent caching
    header("Pragma: no-cache");
    header("Expires: 0");
    header("Cache-Control: no-store, no-cache, must-revalidate");


    // Connect to the database
    require_once 'albums.php';


    // Pick out the inputs
    $artist  = filter_input(INPUT_POST, 'artist');
    $title = filter_input(INPUT_POST, 'name');
    $art = filter_input(INPUT_POST, 'artwork');
    $purchase = filter_input(INPUT_POST, 'purchase_url');
    $desc = filter_input(INPUT_POST, 'description');
    $review = filter_input(INPUT_POST, 'review');


    // Add record
    if ($albums->add ($artist, $title, $art, $purchase, $desc, $review)) {
//      echo '<p><b>Insert successful</b>&nbsp;<a href="index.php">albums</a></p>';
//      $this->query();
        // Log the album creation
        require_once 'log.php';
        $log->log_page("Added $title");
        header("Location: index.php");
    }

?>

