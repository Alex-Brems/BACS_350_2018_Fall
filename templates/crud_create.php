<?php

    require_once 'views.php';


    // Log the page load
    require_once 'log.php';
    $log->log_page();


    // Connect to the database
    require_once 'db.php';


    // Show form for adding a record
    function add_subscriber_view($page) {
        return '
            <div class="card">
                <h3>Add Subscriber</h3>
                <form action="' . $page . '" method="post">
                    <p><label>Name:</label> &nbsp; <input type="text" name="name"></p>
                    <p><label>Email:</label> &nbsp; <input type="text" name="email"></p>
                    <p><input type="submit" value="Sign Up"/></p>
                    <input type="hidden" name="action" value="add">
                </form>
            </div>
        ';
    }


    // Add a new record
    function add_subscriber($db, $name, $email) {
        try {

            // Add database row
            $query = "INSERT INTO subscribers (name, email) VALUES (:name, :email);";
            $statement = $db->prepare($query);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':email', $email);
            $statement->execute();
            $statement->closeCursor();
            header('Location: crud.php');
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
    }

    
    // Display the add form
    $content = add_subscriber_view('crud_create.php');


    // Controller to add record

    $action = filter_input(INPUT_POST, 'action');
    if ($action == 'add') {
        $name  = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        add_subscriber($db, $name, $email);
    }
    

    // Create main part of page content
    $settings = array(
        "site_title" => "Subscriber CRUD Templates",
        "page_title" => "CRUD - CREATE", 
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);
    
?>
