<?php

    require_once 'views.php'; 
    require_once 'log.php';
    require_once 'notes_data.php';
    

    // Page content

    $text = 'Experiment with page rendering, before proceeding to the next steps.';

    $preform = '<pre> function render() { do_this(); }</pre>';

    $markdown = render_markdown("* Bullet lists\n* Styles\n* Headings");

    $notes = note_list_view(query_notes());
        
    $content = 
        render_card('Page Rendering', $text) .
        render_card('Preformatted Text', $preform) .
        render_card('Markdown', $markdown) . 
        render_card('Notes', $notes);


    // Create main part of page content
    $settings = array(
        "site_title" => "Exterior Brain",
        "page_title" => "Test of Dev Features", 
        "content"    => $content);

    echo render_page($settings);

?>
