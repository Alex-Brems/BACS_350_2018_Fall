<?php

    // Start the page
    require_once 'views.php';
 
    $site_title = 'BACS 350 - Demo Server';
    $page_title = 'Subscriber List';
    begin_page($site_title, $page_title);


    // Page Content
    echo '<p><a href="..">Solutions</a></p>';
    
    
    // Bring in subscribers logic
    require_once 'subscriber.php';
    

    // Add record if requested
    $subscribers->handle_add();


    // Render a list of subscribers
    $subscribers->show_subscribers();


    // Show the add form
    $subscribers->add_form();


    end_page();
?>
