<?php

    // Start the page
    require_once 'views.php';
 
    $site_title = 'BACS 350 - Demo Server';
    $page_title = 'Demo 10-3';
    begin_page($site_title, $page_title);


    // Connect to database
    require 'subscriber_db.php';
    $db = subscribers_connect();

    // List suscribers
    require 'subscriber_views.php';
    render_list(query_subscribers ($db));

    add_subscriber_form();

    // End the page
    end_page();
?>