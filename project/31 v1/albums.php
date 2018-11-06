<?php

    // Bring in albums logic
    require_once 'albums_db.php';
    require_once 'albums_crud.php';
    require_once 'albums_views.php';


    // My albums list
    class albums {

        // Database connection
        private $db;

        
        // Automatically connect
        function __construct() {
            $this->db =  remote_connect();
        }

        
        // CRUD
        
        function query() {
            return query_albums($this->db);
        }
        
    
        function clear() {
            return clear_albums($this->db);
        }
        
        
        function add($artist, $title, $art, $purchase, $desc, $review) {
            return add_album ($this->db, $artist, $title, $art, $purchase, $desc, $review);
        }
        
        
        //Views
        
        function show_albums() {
            render_list($this->query());
        }
        
        
        function add_form() {
            add_album_form();
        }
    }


    // Create a list object and connect to the database
    $albums = new albums;

?>
