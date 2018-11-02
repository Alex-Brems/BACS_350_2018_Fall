<?php

    require_once 'views.php';
 
    // Create main part of page content
    $content = "<p>This is where you put your content</p>";

    $settings = array(
        "site_title" => "BACS 350 Templates",
        "page_title" => "Simple Rendered Page", 
        'logo'       => 'Bear.png',
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);

 ?>
