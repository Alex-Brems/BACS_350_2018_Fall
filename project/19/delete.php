<?php
       
    // Prevent caching
    header("Pragma: no-cache");
    header("Expires: 0");
    header("Cache-Control: no-store, no-cache, must-revalidate");


    // Connect to the database
    require_once 'subscriber.php';


    // Delete all records
    if ($subscribers->clear()) {
//        echo '<p><b>Clear successful</b>&nbsp;<a href="index.php">Subscribers</a></p>';
//        $this->query();
          header("Location: index.php");
    }

?>
