<?php

    require_once 'views.php';


    // Log the page load
    require_once 'log.php';
    $log->log_page();


    // Demostrate Local Time formatting
    date_default_timezone_set("America/Denver");
    $content = 'Time Now is ' . date('Y-m-d g:i a');


    // Create main part of page content
    $settings = array(
        "site_title" => "BACS 350 Projects",
        "page_title" => "Date and TimeZone", 
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);

?>
