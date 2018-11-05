<?php
    
    require_once 'views.php';


    // Log the page load
    require_once 'log.php';
    $log->log_page("templates/crud.php");


    //Show links to demo pages
    $links = array('CREATE'=>'crud_create.php',
                   'READ'=>'crud_read.php',
                   'UPDATE'=>'crud_update.php?id=1');
    $content = render_card("Page Template", render_links($links));


    // Create main part of page content
    $settings = array(
        "site_title" => "Subscriber CRUD Templates",
        "page_title" => "CRUD Demos", 
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);

?>
