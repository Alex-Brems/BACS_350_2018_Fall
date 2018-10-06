<?php

    // Start the page
    require_once 'views.php';
 
    $site_title = 'BACS 350 - Demo Server';
    $page_title = 'App Milestones';
    begin_page($site_title, $page_title);


    // Page Content
    echo '<p><a href="../14/pattern.php">MVC Pattern</a></p>';

    
    // Bring in display code
    require_once 'files_views.php';

    echo '<h2>1. PROJECT - Development Setup</h2>
    <ul>
        <li>Create new project</li>
        <li>Apache, MySQL local servers</li>
        <li>Version control</li>
        <li>Test links in browser (local, remote)</li>
        <li>Data admin links (local, remote)</li>
    </ul>';

    echo '<h2>2. PAGE - Build Page Structure</h2>';
    file_content_view('index.php');
    file_content_view('style.css');
    file_content_view('views.php');
   
    echo '<h2>3. DATA - Database interface</h2>';
    file_content_view('../14/subscriber_db.php');
   
    echo '<h2>4. VIEWS - Data Views</h2>';
    file_content_view('../14/subscriber_views.php');

    echo '<h2>5. CONTROLLER - Business Logic</h2>';
    file_content_view('../14/index.php');
     
    // End the page
    end_page();
?>