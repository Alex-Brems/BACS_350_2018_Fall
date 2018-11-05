<?php

    // Start the page
    require_once 'views.php';
 
    $site_title = 'BACS 350 - Alex Brems';
    $page_title = 'Project 24 - Favorite Piece of Media';
    begin_page($site_title, $page_title);


    // Page Content
    echo '<p><a href="..">Projects</a></p>';
    echo '<p><a href="pagelog.php">Page Log</a></p>';
    echo '<p><a href="example.php">Example of Page Template</a></p>';

    // Log the page load
    require_once 'log.php';
    $log->log_page("project/24/index.php");


    // Page Content
    include 'demo-steps.php';
    render_page_content();

//    $text = file_get_contents("demo-steps.php");
//    echo $text;
//    eval($text);

    end_page();
?>
