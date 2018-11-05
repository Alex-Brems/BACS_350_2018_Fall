<?php

    require_once 'views.php';


    // Log the page load
    require_once 'log.php';
    $log->log_page();

    date_default_timezone_set("Europe/London");
    $content = 'GMT is <h1>' . date('Y-m-d g:i a') . '</h1>';

    // Demostrate Local Time formatting
    date_default_timezone_set("America/Denver");
    $content .= 'Time Now is <h1>' . date('Y-m-d g:i a') . '</h1>';



    // Create main part of page content
    $settings = array(
        "site_title" => "BACS 350 Projects",
        "page_title" => "Date and TimeZone", 
        "logo"       => 'Bear.png',
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);

?>
