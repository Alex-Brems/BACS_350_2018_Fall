<?php

    require_once 'views.php';
 
    // Handle any page actions required
    require_once 'log.php';

    // Show buttons to go to other pages
    $content = render_button('Templates', 'index.php');
    $content .= render_button('Solutions', '../solution');
    $content .= render_button('Show Log', 'pagelog.php');

    $log->handle_actions();
    $log->log_page();


    // Show page history
    $content .=  $log->show_log();
  

    // Add form
    $content .=  $log->show_add('pagelog.php');


    // Show Page
    $settings = array(
        "site_title" => "BACS 350 Templates",
        "page_title" => "Display Pages loaded", 
        'logo'       => 'Bear.png',
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);

?>
