<?php

    // Start the page
    require_once 'views.php';
 
    $site_title = 'BACS 350 - Alex Brems - Project 30';
    $page_title = 'Album Creation Index';
    begin_page($site_title, $page_title);

    
    // Bring in albums logic
    require_once 'albums.php';

    // Log the page load
    require_once 'log.php';
    $log->log_page("project/30/index.php");

    // Show the add form
    $albums->add_form();

    // Render a list of albums
    $albums->show_albums();


    end_page();
?>
