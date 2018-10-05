<?php

    // Start the page
    require_once 'views.php';
 
    $site_title = 'BACS 350 - Demo Server';
    $page_title = 'MVC Pattern';
    begin_page($site_title, $page_title);


    // Page Content
    echo '<p><a href="pattern.php">MVC Pattern</a></p>';

    

    // Use subscriber code
    require_once 'subscriber_views.php';
    require_once 'subscriber_db.php';


    // Connect the appropriate database
    $db =  subscribers_connect();


    // View for listing subscribers
    render_list(query_subscribers($db));


    // Form view to add subscriber
    add_subscriber_form();


    // Button to clear
    echo '<a href="delete.php">Reset Subscribers</a>';

        
    // End the page
    end_page();
?>