<?php

    // Start the page
    require_once 'views.php';
 
    $site_title = 'BACS 350 - Demo Server';
    $page_title = 'Page Template';
    begin_page($site_title, $page_title);


    // Page Content Goes here
    
    // Include the main page content
    echo '<h1>HEADLINE</h1><p>BODY</p>';


    // Include the page end
    end_page();

 ?>
