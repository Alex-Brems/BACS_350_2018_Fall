<?php

    // Start the page
    require_once 'views.php';

    $site_title = 'BACS 350 - Demo Server';
    $page_title = 'MVC Pattern';
    begin_page($site_title, $page_title);


    // Page Content
    echo '
        <p><a href="index.php">MVC Pattern Demo</a></p>
        <h2>Database CRUD</h2>

        <h3>DB Connect Pattern</h3>
        <p>
            The Database CRUD Pattern is a design pattern that encapsulates the basic
            operations required for any datatype.
        </p>
        <p>
            CRUD Operations
        </p>
        <ul>
            <li>CREATE - Uses a SQL INSERT statement to create a new record.</li>
            <li>READ - Uses a SQL SELECT statement to query for records.</li>
            <li>UPDATE - Uses a SQL UPDATE statement to edit the content of a record.</li>
            <li>DELETE - Uses a SQL DELETE statement to delete records in the database.</li>
        </ul>
        <p>
            There are two separate connection functions to connect using the appropriate options for
            the database server that you are using.
        </p>
        <pre class="card">
            Usage:
                // Use the subscriber database
                require_once \'subscriber_db.php\';

                // Operations
                insert_subscriber ($name, $email);        // CREATE
                list_subscribers ($name, $email);         // READ
                update_subscriber ($id, $name, $email);   // UPDATE
                delete_subscriber ($id);                  // DELETE
        </pre>

        <h3>Source Code</h3>
        <p>Study the source code in "solution/14" to understand how to define standard database operations.</p>
        <p>Make sure that you have pulled fresh changes from <b>Mark-Seaman/BACS_350_2018_Fall</b> repo.</p>


        <h3>Connect to Local Database</h3>

    ';


    // End the page
    end_page();
?>