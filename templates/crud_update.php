<?php

    require_once 'views.php';

    // Connect to the database
    require_once 'db.php';


    // Lookup Record using ID
    function get_subscriber($db, $id) {
        $query = "SELECT * FROM subscribers WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $record = $statement->fetch();
        $statement->closeCursor();
        return $record;
    }


    // Show form for adding a record
    function edit_subscriber_view($page, $record) {
        $id    = $record['id'];
        $name  = $record['name'];
        $email = $record['email'];
        return '
            <div class="card">
                <h3>Edit Subscriber</h3>
                <form action="' . $page . '" method="post">
                    <p><label>Name:</label> &nbsp; <input type="text" name="name" value="' . $name . '"></p>
                    <p><label>Email:</label> &nbsp; <input type="text" name="email" value="' . $email . '"></p>
                    <p><input type="submit" value="Save Record"/></p>
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="id" value="' . $id . '">
                </form>
            </div>
        ';
    }


    // Update the database
    function edit_subscriber() {
        $id    = filter_input(INPUT_POST, 'id');
        $name  = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        
        // Modify database row
        $query = "UPDATE subscribers SET name = :name, email = :email WHERE id = :id";
        global $db;
        $statement = $db->prepare($query);

        $statement->bindValue(':id', $id);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':email', $email);

        $statement->execute();
        $statement->closeCursor();
        
        header('Location: crud_read.php');
    }
 

    // Controller to add record

    $content = 'No action given';

    // Show edit form
    $id = filter_input(INPUT_GET, 'id');
    if (! empty($id)) {
        // Find Data Record
        $record = get_subscriber($db, $id);
        $content = edit_subscriber_view('crud_update.php', $record);
    }
    
    // Modify Database Record
    $action = filter_input(INPUT_POST, 'action');
    if ($action == 'edit') {
        edit_subscriber();
    }
   

    // Create main part of page content
    $settings = array(
        "site_title" => "Subscriber CRUD Templates",
        "page_title" => "CRUD - UPDATE", 
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);
?>
