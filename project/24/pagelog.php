<?php

    // Start the page
    require_once 'views.php';
 
<<<<<<< HEAD
    $site_title = 'BACS 350 - Demo Server';
=======
    $site_title = 'BACS 350 - Alex Brems';
>>>>>>> 190e4d4611484dfb17c21dcbf2aac908758883bd
    $page_title = 'Display Pages loaded';
    begin_page($site_title, $page_title);


    // Page Content
<<<<<<< HEAD
    echo '<p><a href="..">Solutions</a></p>';
=======
    echo '<p><a href="..">Projects</a></p>';
>>>>>>> 190e4d4611484dfb17c21dcbf2aac908758883bd
    echo '<p><a href="index.php">Subscribers</a></p>';
      

    // Handle any actions required
    require_once 'log.php';
    $log->handle_actions();
    

    // Show page history
    $log->show_log();


    // Clear the list by sending "action" of "clear" to this view
    echo '<p><a href="pagelog.php?action=clear" class="btn">Clear Log</a></p>';


    end_page();
?>
