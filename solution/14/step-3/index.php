<?php

    // Start the page
    require_once '../views.php';

    $page_title = 'MVC Pattern - Step 3';
    begin_page($page_title);


    // Page Content
    echo '
        <p><a href="..">MVC Pattern</a></p>
        <h2>Step 3 - Database CRUD</h2>

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
        <pre>
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
        <p>Study the source code in "solution/14/step-3" to understand how to define standard database operations.</p>
        <p>Make sure that you have pulled fresh changes from <b>Mark-Seaman/BACS_350_2018_Fall</b> repo.</p>


        <h3>Connect to Local Database</h3>

    ';


    // Attempt to connect
    require_once 'subscriber_db.php';
//    $db = local_connect();
    $db =  remote_connect();

    list_subscribers ();


    // Sign Up Form
    echo '<div class="card"><form action="insert.php" method="get">

        <p><label>Name:</label> &nbsp; <input type="text" name="name"></p>
        <p><label>Email:</label> &nbsp; <input type="text" name="email"></p>
        <p><input type="submit" value="Sign Up"/></p>
    </form></div>';


    // Show links for page testing
//    require 'test.php';


    // End the page
    end_page();
?>