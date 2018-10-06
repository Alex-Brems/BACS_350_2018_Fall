<?php

    // Start the page
    require_once 'views.php';
 
    $site_title = 'BACS 350 - Demo Server';
    $page_title = 'MVC Pattern';
    begin_page($site_title, $page_title);


    // Page Content
    echo '<p><a href="pattern.php">MVC Pattern</a></p>';

    require_once 'subscriber_db.php';
    require_once 'subscriber_views.php';

    class Subscribers {
        
        public $db;

        function __construct() {
            $this->db =  subscribers_connect();
        }

        function query() {
            return query_subscribers($this->db);
        }
        
        function show_subscribers() {
            render_list($this->query());
        }
    }

    $subscribers = new Subscribers();


    // View for listing subscribers
    $subscribers->show_subscribers();


//    // Form view to add subscriber
//    add_subscriber_form();
//
//
//    // Button to clear
//    echo '<a href="delete.php">Reset Subscribers</a>';
//
//        
    // End the page
    end_page();
?>