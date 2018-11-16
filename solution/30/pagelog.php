<?php

    require_once 'views.php';
 
    // Handle any page actions required
    require_once 'log.php';
    $log->handle_actions();
    $log->log_page();


    // Show page history
    $history = $log->show_log();
  

    // Add form
    $add = $log->show_add('pagelog.php');
    $content =  $history . $add;


    // Show Page
    $settings = array(
        "site_title" => "BACS 350 Templates",
        "page_title" => "Display Pages loaded", 
        "style"      => 'style.css',
        'user'       => '',
        "content"    => $content);

    echo render_page($settings);

?>
