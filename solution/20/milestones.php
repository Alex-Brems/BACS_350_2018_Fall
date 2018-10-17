<?php

    require_once 'views.php';
 
    $site_title = 'BACS 350 - Demo Server';
    $page_title = 'App Milestones';
    begin_page($site_title, $page_title);

    echo '
        <pre>
        1. PROJECT - Create new project
            
            * Pull new solution code
            * Setup development workflow (local and remote)
            * Test that you can load pages
            * Browser Bookmarks:  Local Test, Local Data, Remote Test, Remote Data
            * Commit code with comment "Create new project"

        2. PAGE - Create app page
            
            * Use the page pattern
            * Demoed in solution 3
            * Create a page "index.php"
            * Setup and debug style and structure
            * Commit code with comment "Create app page"

        3. DATABASE - Create database connection
            
            * Create both local and remote database
            * Save SQL for table in table.sql
            * Debug options for both local and remote connection
            * Save connection go in PHP file
            * Use design pattern from solution 6
            * Commit code with comment "Create database connection"

         4. CRUD - Create subscriber CRUD
            
            * Create PHP file with CRUD logic
            * Use design pattern from solution 14
            * Commit code with comment "Create subscriber CRUD"

        5. VIEWS - Create subscriber Views
            
            * Gather code into subscriber_views.php
            * Use design pattern from solution 14
            * Commit code with comment "Create subscriber Views"

        6. CONTROLLER - Create subscriber Controller
            
            * Gather business code into index.php
            * Use design pattern from solution 14
            * Show the list with an add form
            * Automatically go back to list after insert is done
            * Commit code with comment "Create subscriber Controller"
        </pre>
    ';

    end_page();

?>
