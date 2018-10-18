<?php

    /* ----------------------------------------------
        This code shows how to hook up a logging utility.

        usage:
            $text_message = "This text message";
            require_once 'log.php';
            $log->log($text_message);
            
            $log->show_log();


        SQL Database table

            // Create table log: date, text
            CREATE TABLE log (
              id int(3) NOT NULL AUTO_INCREMENT,
              date varchar(100)  NOT NULL,
              text varchar(100) NOT NULL,
              PRIMARY KEY (id)
            );

    ---------------------------------------------- */


    /* ----------------------------------------------
        Data - CRUD Operations
        
        CREATE - add_log($db, $text)
        READ   - query_log ($db)
        UPDATE
        DELETE - clear_log($db)
    ---------------------------------------------- */


    // Add a new record
    function add_log($db, $text) {

        // Show if insert is successful or not
        try {
            // Create a string for "now"
            $date = date('Y-m-d g:i a');
            
            // Add database row
            $query = "INSERT INTO log (date, text) VALUES (:date, :text);";
            $statement = $db->prepare($query);
            $statement->bindValue(':date', $date);
            $statement->bindValue(':text', $text);
            $statement->execute();
            $statement->closeCursor();
            return true;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
    }


    // Delete all database rows
    function clear_log($db) {
        
        try {
            $query = "DELETE FROM log";
            $statement = $db->prepare($query);
            $row_count = $statement->execute();
            return true;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
        
    }


    // Query for all log
    function query_log ($db) {

        $query = "SELECT * FROM log";
        $statement = $db->prepare($query);
        $statement->execute();
        return $statement->fetchAll();

    }


    /* ----------------------------------------------
        Views
        
        CREATE - add_log_form()
        READ   - render_list($list)
        UPDATE (none)
        DELETE (none)
    ---------------------------------------------- */


    // add_log_form -- Create an HTML form to add record.
    function add_log_form() {
        
        echo '
            <div class="card">
                <h3>Add log</h3>
            
                <form action="insert.php" method="post">
                    <p><label>Text:</label> &nbsp; <input type="text" name="text"></p>
                    <p><input type="submit" value="Sign Up"/></p>
                </form>
            </div>
            ';
        
    }


    // render_list -- Loop over all of the log to make a bullet list
    function render_history($list) {

        echo '
            <div class="card">
                <h3>Page Load History</h3> 
                <ul>
            ';
        foreach ($list as $s) {
            echo '<li>' . $s['id'] . ', ' . $s['date'] . ', ' . $s['text'] . '</li>';
        }
        echo '
                </ul>
            </div>';
     
    }

    

    /* ----------------------------------------------
        Controller
        
        Constructor - local or remote database
        
        Data
            query
            clear
            log
        
        Views
            show_log
            add form
            
    ---------------------------------------------- */
    
    require_once 'db.php';


    // My log list
    class Log {

        // Database connection
        private $db;

        function __construct() {
            $this->db =  connect_database();
        }

        
        // CRUD
        function query() {
            return query_log($this->db);
        }
        
        function clear() {
            return clear_log($this->db);
        }
           
        function log($text) {
            return add_log ($this->db, $text);
        }
        
        function log_page($page) {
            $action = filter_input(INPUT_POST, 'action') . filter_input(INPUT_GET, 'action');
            $text = "$page (action=$action)";
            $this->log ($text);
        }
        
        function handle_actions() {
            $action = filter_input(INPUT_GET, 'action');
            if ($action == 'clear') {
                $this->clear();
            }
        }
        
        
        
        // Views
        function show_log() {
            render_history($this->query());
        }
        
        function add_form() {
            add_log_form();
        }
    }


    // Create a list object and connect to the database
    $log = new Log;

?>
