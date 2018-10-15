<?php

    // Bring in logs logic
    require_once 'db.php';
    require_once 'log_crud.php';
    require_once 'log_views.php';


    // My log list
    class Log {

        // Database connection
        private $db;

        function __construct() {
            $this->db =  log_connect();
        }

        
        // CRUD
        
        function query() {
            return query_log($this->db);
        }
        
        function clear() {
            return clear_log($this->db);
        }
           
        function add($text) {
            return add_log ($this->db, $text);
        }
        
        
        //Views
        
        function show_log() {
            render_list($this->query());
        }
        
        function add_form() {
            add_log_form();
        }
    }


    // Create a list object and connect to the database
    $log = new Log;

?>
