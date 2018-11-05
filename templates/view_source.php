<?php

    require_once 'views.php';
 
    // Create main part of page content
   
    $path = filter_input(INPUT_GET, 'path');

    $content =  '<h3>templates/index.php</h3>' . render_source_code($path);

    $settings = array(
        "site_title" => "BACS 350 Templates",
        "page_title" => "View Source Code", 
        'logo'       => 'Bear.png',
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);

 ?>
