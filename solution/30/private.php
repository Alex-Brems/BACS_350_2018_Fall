<?php
    
    require_once 'log.php';
    require_once 'views.php';
    require_once 'auth.php';


    // Log the page load
    $log->log_page();


    // Check on login
    $login = handle_auth_actions();
    if (empty($login)) {
        require_login('private.php');
        
        // Display the page content
        $content = render_button('Templates', '../../templates');
        $content .= render_button('Solutions', '..');
        $content .= render_button('Show Log', 'pagelog.php');
        
        $content .= '<h2>Private Page</h2>
        <p>
            This solution demonstrates the use of authentication code.
            Visiting this page requires a login.
        </p><p>
            <a href="index.php">Public Page</a>
        </p>';
    }
    else {
        $content = $login;
    }
    

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
