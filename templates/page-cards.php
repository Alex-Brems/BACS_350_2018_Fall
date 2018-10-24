<?php

    require_once 'views.php';
 
    // Create main part of page content
    $links = array(
        "Simple Page"    => "page.php",
        "Page With Cards" => "page-cards.php",
        "Header for Page" => "https://seamansguide.com/guide/PhpApps/templates/header.php",
        "Footer for Page" => "https://seamansguide.com/guide/PhpApps/templates/footer.php",
    );

   
    $content = 
        render_card ('Page Templates', render_links($links)) . 
        render_card ('Source Code', render_source_code('page-cards.php'));


    
    $settings = array(
        "site_title" => "BACS 350 Templates",
        "page_title" => "Simple Rendered Page", 
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);

 ?>
