<?php 
    
    require_once 'views.php';
    require_once 'log.php';
    $log->log_page();

    // Create main part of page content
    $intro_text = "<p>These templates are reusable code to build apps the easy way.</p>";

    // Create main part of page content


    // Card 1
    $title = 'Page Templates';
    $text = "Build pages using HTML templates that are stored in files.";
    $links = array(
        "Simple Page"    => "page.php",
        "Page With Cards" => "page-cards.php",
        "Header for Page" => "https://seamansguide.com/guide/PhpApps/templates/header.php",
        "Footer for Page" => "https://seamansguide.com/guide/PhpApps/templates/footer.php",
    );
    $card1 = render_links_card($title, $text, $links);


    // Card 2
    $title = 'CRUD Templates';
    $text = "Demonstrate how to perform each CRUD operation (both view and data)";
    $links = array(
        "CRUD Index" => "crud.php",
        "CREATE" => "crud_create.php",
        "READ" => "crud_read.php",
        "UPDATE" => "crud_update.php",
        "DELETE" => "crud_delete.php",
    );
    $card2 = render_links_card($title, $text, $links);


    // Card 3
    $title = 'Logging and Error Handling';
    $text= "Demonstrate how to perform each CRUD operation (both view and data)";
    $links = array(
        "Page Load Logging" => "https://seamansguide.com/guide/PhpApps/templates/log.php",
        "History of Pages" => "https://seamansguide.com/guide/PhpApps/templates/pagelog.php",
    );
    $card3 = render_links_card($title, $text, $links);


    // Card 4
    $title = 'Files';
    $text = "Demonstrate how to perform each CRUD operation (both view and data)";
    $links = array(
        "Files Utilities" => "view_source.php?path=files.php",
        "Directory Listing" => "dirlist.php?path=../solution",
        "File Listing" => "filelist.php?path=../templates",
        "View Source" => "view_source.php?path=index.php",
    );
    $card4 = render_links_card($title, $text, $links);

    
    // Display the entire page
    $settings = array(
        "site_title" => "BACS 350 Templates",
        "page_title" => "Index of Templates", 
        "style"      => 'style.css',
        "content"    => $intro_text . $card1 . $card2 . $card3 . $card4);

    echo render_page($settings);

?>
