<?php

    // Bring in subscribers logic
    require_once 'subscriber_db.php';
    require_once 'subscriber_crud.php';
    require_once 'subscriber_views.php';


    // My Subscriber list
    class Subscribers {

        // Database connection
        private $db;

        
        // Automatically connect
        function __construct() {
            $this->db =  subscribers_connect();
        }

        
        // CRUD
        
        function query() {
            return query_subscribers($this->db);
        }
        
    
        function clear() {
            return clear_subscribers($this->db);
        }
        
        
        function add($name, $email) {
            return add_subscriber ($this->db, $name, $email);
        }
        
        function handle_add() {
            $action = filter_input(INPUT_POST, 'action');
            if ($action == 'add') {
                $name  = filter_input(INPUT_POST, 'name');
                $email = filter_input(INPUT_POST, 'email');
                $this->add($name, $email);
            }
        }
        
        // Views
        
        function show_subscribers() {
            render_list($this->query());
        }
        
        
        function add_form() {
            add_subscriber_form();
        }
    }


    // Create a list object and connect to the database
    $subscribers = new Subscribers;

?>
