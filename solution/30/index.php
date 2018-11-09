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


    $content .= '
    <h2>Public Page</h2>
    <p>
        This solution demonstrates the use of authentication code.
        Visiting this page does not require a login.

        <a href="private.php">Private Page</a>
    </p>
    ';
    

    // Create main part of page content
    $settings = array(
        "site_title" => "System Admins",
        "page_title" => "User Authentication", 
        "logo"       => "Bear.png",
        "style"      => 'style.css',
        'user'       => user_info(),
        "content"    => $content);

    echo render_page($settings);

?>
