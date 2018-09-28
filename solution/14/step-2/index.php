<?php

    // Start the page
    require_once '../views.php';

    $page_title = 'MVC Pattern - Step 2';
    begin_page($page_title);


    // Page Content
    echo '
        <p><a href="..">MVC Pattern</a></p>
        <h2>Step 2 - Database Connection</h2>

        <h3>DB Connect Pattern</h3>
        <p>
            The DB Connect Pattern is a design pattern that lets your code select between two databases.
            You can either use a local database server or the one at Bluehost.
            Completely different options are required for each of the servers.
        </p>
        <p>
            There are two separate connection functions to connect using the appropriate options for
            the database server that you are using.
        </p>
        <pre>
            Usage:
                // Use the subscriber database
                require_once \'subscriber_db.php\';

                // Choose one
                $db = local_connect();
                $db = remote_connect();
        </pre>

        <h3>Source Code</h3>
        <p>Study the source code in "solution/14/step-2" to understand how to define usable page structure.</p>
        <p>Make sure that you have pulled fresh changes from <b>Mark-Seaman/BACS_350_2018_Fall</b> repo.</p>


        <h3>Connect to Local Database</h3>


    ';


    // Attempt to connect
    require_once 'subscriber_db.php';
    local_connect();
//    remote_connect();



    // Show links for page testing
//    require 'test.php';


    // End the page
    end_page();
?>