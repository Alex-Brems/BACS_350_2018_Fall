<?php

    // Start the page
    require_once 'views.php';
 

    // Log the page load
    require_once 'log.php';
<<<<<<< HEAD
    $log->log_page("solution/24/example.php");
=======
    $log->log_page("project/24/example.php");
>>>>>>> 190e4d4611484dfb17c21dcbf2aac908758883bd


    // Page Content
    $settings = array(
        "page_title" => "Page Templates", 
        "site_title" => "BACS 200 Demos",
        "content"    => "NO CONTENT");

    $settings = array(
        "page_title" => "The Next 100 Years", 
        "site_title" => "Book Notes",
        "content"    => file_get_contents("100Years.html"));

    echo render_page($settings);


?>
