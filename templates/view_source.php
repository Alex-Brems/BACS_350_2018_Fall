<?php

    require_once 'views.php';
 
    // Create main part of page content
   
    $path = filter_input(INPUT_GET, 'path');

    $content =  render_card ('Source Code', render_source_code($path));

    $settings = array(
        "site_title" => "BACS 350 Templates",
        "page_title" => "View Source Code", 
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);

 ?>
