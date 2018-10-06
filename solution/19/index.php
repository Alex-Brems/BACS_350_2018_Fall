<?php

    // Start the page
    require_once 'views.php';
 
    $site_title = 'BACS 350 - Demo Server';
    $page_title = 'Objects for Data';
    begin_page($site_title, $page_title);


    // Page Content
    echo '<p><a href="..">Solutions</a></p>';
    echo '<p><a href="milestones.php">Milestones</a></p>';

    
    // Bring in subscribers logic
    require_once 'subscriber.php';


    // Render a list of subscribers
    $subscribers->show_subscribers();
    

    // Show the add form
    $subscribers->add_form();


    // Button to clear
    echo '<a href="delete.php">Reset Subscribers</a>';


    end_page();
?>
