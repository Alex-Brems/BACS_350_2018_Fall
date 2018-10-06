<?php

    // Start the page
    require_once 'views.php';
 
    $site_title = 'BACS 350 - Alex Brems';
    $page_title = 'BearNotes Index';
    begin_page($site_title, $page_title);


    // Page Content
    //echo '<p><a href="..">Solutions</a></p>';
    //echo '<p><a href="milestones.php">Milestones</a></p>';

    
    // Bring in notess logic
    require_once 'notes.php';


    // Render a list of notes
    $notes->show_notes();
    

    // Show the add form
    $notes->add_form();


    // Button to clear
    echo '<a href="delete.php">Reset notes</a>';


    end_page();
?>
