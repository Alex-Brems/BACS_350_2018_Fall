<?php

    require_once 'views.php';


    // Connect to the database
    require_once 'db.php';


    // Log the page load
    require_once 'log.php';
    $log->log_page();


    // Query for all subscribers
    function query_subscribers ($db) {
        $query = "SELECT * FROM subscribers";
        $statement = $db->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }


    // render_table -- Create a bullet list in HTML
    function subscriber_list($table) {
        $s = '<table>';
        $s .= '<tr><th>Name</th><th>Email</th></tr>';
        foreach($table as $row) {
            $edit = render_link($row[1], "crud_update.php?id=$row[0]");
            $email = $row[2];
            $delete = render_link("delete", "crud_delete.php?id=$row[0]&action=delete");
            $row = array($edit, $email, $delete);
            $s .= '<tr><td>' . implode('</td><td>', $row) . '</td></tr>';
        }
        $s .= '</table>';
        return $s;
    }


    // Display the page content
    
    $list = subscriber_list(query_subscribers ($db));
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
