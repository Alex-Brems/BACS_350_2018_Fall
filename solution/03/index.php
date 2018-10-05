<?php

    // Start the page
    require_once 'views.php';

    $site_title = 'BACS 350 - Demo Server';
    $page_title = 'Page Design Pattern';
    begin_page($site_title, $page_title);


    // Your page content goes here

    // Include other content
    require 'pattern.html';


    // End the page
    end_page();

?>
