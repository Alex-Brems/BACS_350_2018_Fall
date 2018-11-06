<?php

    // Start the page
    require_once 'views.php';
 
    $site_title = 'BACS 350 - Alex Brems';
    $page_title = 'Display Pages loaded';
    begin_page($site_title, $page_title);
      

    // Handle any actions required
    require_once 'log.php';
    $log->handle_actions();
    

    // Show page history
    $log->show_log();


    end_page();
?>
