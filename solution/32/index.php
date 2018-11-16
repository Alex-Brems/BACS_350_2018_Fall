<?php

    require_once 'views.php';
    require_once 'db.php';    
    require_once 'log.php';
    require_once 'files.php';
    require_once 'Parsedown.php';
    

    // Convert the Markdown into HTML
    $Parsedown = new Parsedown();
    $markdown = read_file('brain.md');
    $markdown = $Parsedown->text($markdown);
    
    // Display the page content
    $content = render_button('Templates', '../../templates');
    $content .= render_button('Solutions', '..');
    $content .= render_button('Show Log', 'pagelog.php');
    $content .= $markdown;


    // Create main part of page content
    $settings = array(
        "site_title" => "Exterior Brain",
        "page_title" => "A smarter tool", 
        "content"    => $content);

    echo render_page($settings);

?>
