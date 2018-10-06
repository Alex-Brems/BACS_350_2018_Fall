<?php

    require_once 'views.php';
 
    $site_title = 'BACS 350 - Demo Server';
    $page_title = 'Page Logging';
    begin_page($site_title, $page_title);


    // Page Content
    echo '<p><a href="..">Solutions</a></p>';

    
    // Bring in log logic
    require_once 'log.php';
    $log->add('solution/11/index.php');
    $log->show_log();


    end_page();

 ?>
