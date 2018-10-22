<?php

    
    // Start the page
    require_once 'views.php';
    require_once 'files.php';


    // Log the page load
    require_once 'log.php';
    $log->log_page("solution/25");


    $cities = array(array('Greeley', 'Denver', 'Colo Springs'),
                    array('Cheyenne', 'Gillette', 'Rock Springs'));

    $links = render_links(array('Colorado','Nebraska','Wyoming'));

    $files = get_file_list('../../project');


    // Create cards for Page

    // table
    $card1 = render_card ('Render Table', render_table($cities));

    // links
    $card2 = render_card ('Hyperlinks', $links);

    // CSV
    $csv = '<pre>' . render_csv($cities) . '</pre>';
    $card3 = render_card('Render CSV', $csv);
        
    // File list
    $card4 = render_card('Project File List', render_links($files));

    // Article
    $paragraphs = array('This is a paragraph 1.', 'This is a paragraph 2.');
    $intro = render_article('Rendering Demo', $paragraphs);

    $content = $intro . $card1 . $card2 . $card3 . $card4;


    // Create main part of page content
    $settings = array(
        "page_title" => "My Projects", 
        "site_title" => "BACS 350 Projects",
//        "style"      => 'style.css',
        "style"      => 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
        "content"    => $content);

    echo render_page($settings);


?>
