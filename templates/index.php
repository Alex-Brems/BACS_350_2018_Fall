<?php 
    require_once 'views.php';
    require_once 'log.php';


    // Log the page load
    $log->log_page();
    $content = render_button('Templates', 'index.php');
    $content .= render_button('Solutions', '../solution');
    $content .= render_button('Show Log', 'pagelog.php');


    // Create main part of page content
    $content .= "<p>These templates are reusable code to build apps the easy way.</p>";


    // Card 1
    $title = 'Page Templates';
    $text = "Build pages using HTML templates that are stored in files.";
    $links = array(
        "Simple Page"    => "page.php",
        "Page With Cards" => "page-cards.php",
        "Header for Page" => "https://seamansguide.com/guide/PhpApps/templates/header.php",
        "Footer for Page" => "https://seamansguide.com/guide/PhpApps/templates/footer.php",
    );
    $content .= render_links_card($title, $text, $links);


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
    $content .= render_links_card($title, $text, $links);


    // Card 3
    $title = 'Logging and Error Handling';
    $text= "Demonstrate how to perform each CRUD operation (both view and data)";
    $links = array(
        "Page Load Logging" => "view_source.php?path=log.php",
        "History of Pages" => "pagelog.php",
        'Local Time'        => 'timezone.php',
    );
    $content .= render_links_card($title, $text, $links);


    // Card 4
    $title = 'Files';
    $text = "Demonstrate how to perform each CRUD operation (both view and data)";
    $links = array(
        "Files Utilities" => "view_source.php?path=files.php",
        "Directory Listing" => "dirlist.php?path=../solution",
        "File Listing" => "filelist.php?path=../templates",
        "View Source" => "view_source.php?path=index.php",
        'Markdown' => 'markdown.php',
    );
    $content .= render_links_card($title, $text, $links);


    // Card 5
    $title = 'Apps';
    $text = "Full size apps to work with one type of data";
    $links = array(
        "Email List" => "email_list.php"
    );
    $content .= render_links_card($title, $text, $links);


    // Display the entire page
    $settings = array(
        "site_title" => "BACS 350 Templates",
        "page_title" => "Index of Templates", 
        'logo'       => 'Bear.png',
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);

?>
