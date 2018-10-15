<?php

    // Start the page
    require_once 'views.php';
 
    $site_title = 'BACS 350 - Demo Server';
    $page_title = 'Objects for Data';
    begin_page($site_title, $page_title);


    // Page Content
    echo '<p><a href="..">Solutions</a></p>';
    echo '<p><a href="pagelog.php">Page Log</a></p>';
    
    
    // Bring in subscribers logic
    require_once 'subscriber.php';
    

    // Log the page load
    require_once 'log.php';
    
    $log->log_page("subscriber/index.php");


    // Add record from form
    $subscribers->handle_actions();


    // Render a list of subscribers
    $subscribers->show_subscribers();


    // Show the add form
    $subscribers->add_form();


    // Clear the list by sending "action" of "clear" to this view
    echo '<p><a href="index.php?action=clear" class="btn">Clear Log</a></p>';


    end_page();
?>
