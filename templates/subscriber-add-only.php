<?php

    // Create a database connection
    require_once 'db.php';
    require_once 'log.php';


    // Add a new record
    function add_subscriber($db) {
        try {
            $name  = filter_input(INPUT_POST, 'name');
            $email = filter_input(INPUT_POST, 'email');
            $query = "INSERT INTO subscribers (name, email) VALUES (:name, :email);";
            $statement = $db->prepare($query);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':email', $email);
            $statement->execute();
            $statement->closeCursor();
            header('Location: email_list.php');
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
    }

    // Show form for adding a record
    function add_subscriber_view() {
        return '
            <div class="card">
                <h3>Add Subscriber</h3>
                <form action="email_list.php" method="post">
                    <p><label>Name:</label> &nbsp; <input type="text" name="name"></p>
                    <p><label>Email:</label> &nbsp; <input type="text" name="email"></p>
                    <p><input type="submit" value="Sign Up"/></p>
                    <input type="hidden" name="action" value="create">
                </form>
            </div>
        ';
    }


    // Handle all action verbs
    function handle_actions() {
        $id = filter_input(INPUT_GET, 'id');
        global $subscribers;
        global $log;

        // POST
        $action = filter_input(INPUT_POST, 'action');
        if ($action == 'create') {    
            $log->log('Subscriber CREATE');                    // CREATE
            $subscribers->add();
        }
        

        // GET
        $action = filter_input(INPUT_GET, 'action');
        if (empty($action)) {                                  
            $log->log('Subscriber READ');                      // READ
            return $subscribers->list_view();
        }
       if ($action == 'add') {
            $log->log('Subscriber Add View');
            return $subscribers->add_view();
        }
    }
       

    // Query for all subscribers
    function query_subscribers ($db) {
        $query = "SELECT * FROM subscribers";
        $statement = $db->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }


    // render_table -- Create a bullet list in HTML
    function subscriber_list_view ($table) {
        $s = render_button('Add Subscriber', 'email_list.php?action=add') . '<br><br>';
        $s .= '<table>';
        $s .= '<tr><th>Name</th><th>Email</th></tr>';
        foreach($table as $row) {
            $row = array("$row[0]. $row[1]", $row[2]);
            $s .= '<tr><td>' . implode('</td><td>', $row) . '</td></tr>';
        }
        $s .= '</table>';
        
        return $s;
    }


    /* -------------------------------------------------------------
    
                        S U B S C R I B E R S
    
     ------------------------------------------------------------- */

    // My Subscriber list
    class Subscribers {

        // Database connection
        private $db;

        
        // Automatically connect
        function __construct() {
            global $db;
            $this->db =  $db;
        }

        
        // CRUD
        
        function add($name, $email) {
            return add_subscriber ($this->db);
        }
        
        function query() {
            return query_subscribers($this->db);
        }
        
        
        // Views
        
        function handle_actions() {
            return handle_actions();
        }
        
        function add_view() {
            return add_subscriber_view();
        }
        
        function list_view() {
            return subscriber_list_view($this->query());
        }
        
    }


    // Create a list object and connect to the database
    $subscribers = new Subscribers;

?>
