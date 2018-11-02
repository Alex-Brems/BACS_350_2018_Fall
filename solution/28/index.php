<?php
    
    require_once 'views.php';
    require_once 'db.php';
    require_once 'log.php';


    // Log the page load
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
        $s = render_link('Add Subscriber', 'crud_create.php') . '<br><br>';
        $s .= '<table>';
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
    
    $content = render_card("Subscribers", $list);


    // Create main part of page content
    $settings = array(
        "site_title" => "Email Manager",
        "page_title" => "Demo of CRUD Logic", 
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);



?>
