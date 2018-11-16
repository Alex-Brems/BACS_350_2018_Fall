<?php

    require_once 'files.php'; 
    require_once 'log.php';
    require_once 'notes_data.php';
    require_once 'views.php'; 
    

    // Page content

    $text = 'Display slide shows';

    $markdown = render_markdown_file("slides.md");

//    $notes = note_list_view(query_notes());

    $source = '<pre>' . read_file("slides.md") . '</pre>';
        
    $slides = render_link('slides.php', 'slides.php');

    $template = read_file("slides.php");
    $template = "<div><h2>Code for Slides</h2><pre>$template</pre></div>";

    // Assemble all the cards
    $content = render_cards(array(
        'Create Slide Show' => $text,
        'Slide Show' => $slides,
        'HTML View' => $markdown,
        'Markdown' => $source,
    )) . $template ;
        

    // Create main part of page content
    $settings = array(
        "site_title" => "BACS 350 Demo Server",
        "page_title" => "Slide Show Display", 
        "content"    => $content);

    echo render_page($settings);

?>
