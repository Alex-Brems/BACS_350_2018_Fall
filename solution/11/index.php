<?php

    // Include the page start
    $page_title = "BACS 350 - Project 11 - Page Logging";
    include 'header.php';


    // Log the page loading
    $page = 'solution/11/index.php';
    $text = "Loading Page: $page";
    require('log.php');


    // Include the main page content
    echo '<h1>Page Logging Demo</h1>';
    require ('log-history');


    // Include the page end
    include 'footer.php';

 ?>
