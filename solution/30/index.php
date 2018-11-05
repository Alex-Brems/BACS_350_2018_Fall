<?php
    
    require_once 'log.php';
    require_once 'views.php';
    require_once 'auth.php';


    // Log the page load
    $log->log_page();


    // Display the page content
    $content = render_button('Templates', '../../templates');
    $content .= render_button('Solutions', '..');
    $content .= render_button('Show Log', 'pagelog.php');

    // Try this login

    $email = "me@here.com";
    $password = 'Rock on dude!';

    // User Setup:
    // require_once 'db.php';
    // register_user($db, $email, $password, 'New', 'User');
        
    $content .= $auth->show_valid ($email, $password);


    // Create main part of page content
    $settings = array(
        "site_title" => "System Admins",
        "page_title" => "User Authentication", 
        "logo"       => "Bear.png",
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);

?>
