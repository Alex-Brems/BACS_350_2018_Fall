<?php

    // Start the page
    require_once 'views.php';
 
    $site_title = 'BACS 350 - Demo Server';
    $page_title = 'Objects for Data';
    begin_page($site_title, $page_title);


    // Page Content
    echo '<p><a href="..">Solutions</a></p>';
    
    
    // Bring in subscribers logic
    require_once 'subscriber.php';
    

    /* 
        This code used to be in the file "insert.php".
        The old solution required a different page to be written.
        After a successful SQL INSERT there was a redirect back
        to the index.php page.
        
        This new solution uses a single page.
    */


    // Show the add form
    $action = filter_input(INPUT_POST, 'action');
    if ($action == 'add') {
        // Pick out the inputs
        $name  = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $subscribers->add($name, $email);
    }

    // $subscribers->handle_add($name, $email);


    // Render a list of subscribers
    $subscribers->show_subscribers();


    // Show the add form
    $subscribers->add_form();


    end_page();
?>
