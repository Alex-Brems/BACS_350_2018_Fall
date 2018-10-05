<?php

    // Start the page
    require_once 'views.php';
 
    $site_title = 'BACS 350 - Demo Server';
    $page_title = 'Local and Remote Development';
    begin_page($site_title, $page_title);


    // Page Content
    echo "
        <p><a href='pattern.php'>MVC Pattern</a></p>
        
        <h2>Setup Apache</h2>
        <p>To develop code locally you must get Apache set up on the local machine.  See the tutorial on the 
        class website.</p>
        
        <h2>Create Databases</h2>
        <p>A database needs to be created on the local machine as well as on the remote machine.</p>
        
        <h2>Connect to the Correct Database</h2>
        <p>The database connection options used will be different locally and remotely.</p>
        <p>The remote server pages can test for a well-known host name indicating that the server 
        needs to connect to the Bluehost database.  Otherwise the local database is used</p>
        
        ";

    function read_file($path) {
        $text = file_get_contents($path);
        $text = htmlspecialchars($text);
        return $text;
    }

    // Source code for DB
    $path = 'subscriber_db.php';
    echo '<div class="card"><h3>Source Code - ' . $path . '</h3>';
    $text = read_file($path);
    echo '<pre>' . $text . '</pre></div>';

//    // Use subscriber code
//    require_once 'subscriber_views.php';
//    require_once 'subscriber_db.php';
//
//
//    // Connect the appropriate database
//    $db =  subscribers_connect();
//
//
//    // View for listing subscribers
//    render_list(query_subscribers($db));
//
//
//    // Form view to add subscriber
//    add_subscriber_form();
//
//
//    // Button to clear
//    echo '<a href="delete.php">Reset Subscribers</a>';

        
    // End the page
    end_page();

?>