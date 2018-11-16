<?php

    require_once 'views.php';
    require_once 'db.php';    
    require_once 'log.php';
    require_once 'files.php';

    require_once 'Parsedown.php';
    

    // Markdown Text
    $markdown = read_file('markdown.md');


    // Convert the Markdown into HTML
    $Parsedown = new Parsedown();
    $content = $Parsedown->text($markdown);
    

    // Create main part of page content
    $settings = array(
        "site_title" => "BACS 350 Projects",
        "page_title" => "Markdown Parser", 
        "logo"       => "Bear.png",
        "style"      => 'style.css',
        'user'       => '',
        "content"    => $content);

    echo render_page($settings);

?>
