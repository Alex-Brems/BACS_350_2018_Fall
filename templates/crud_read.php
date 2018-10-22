<?php

    require_once 'views.php';


    // Connect to the database
    require_once 'db.php';


    // Log the page load
    require_once 'log.php';
    $log->log_page("templates/crud_read.php");


    // Query for all subscribers
    function query_subscribers ($db) {
        $query = "SELECT * FROM subscribers";
        $statement = $db->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }
    

    // Display the page content
    
    $list = render_table(query_subscribers ($db));
    $link = '<div>' . render_link('CRUD', 'crud.php') . '</div>';
    $content = $link . render_card("Subscriber List", $list);


    // Create main part of page content
    $settings = array(
        "site_title" => "Subscriber CRUD Templates",
        "page_title" => "CRUD - READ", 
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);

?>
