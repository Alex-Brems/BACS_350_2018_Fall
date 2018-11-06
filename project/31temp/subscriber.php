<?php

    // Create a database connection
    require_once 'db.php';
    require_once 'log.php';

    $page = 'index.php';


    // Add a new record
    function add_subscriber($db) {
        try {

            // Pick out the inputs
            $artist  = filter_input(INPUT_POST, 'artist');
            $title = filter_input(INPUT_POST, 'name');
            $art = filter_input(INPUT_POST, 'artwork');
            $purchase = filter_input(INPUT_POST, 'purchase_url');
            $desc = filter_input(INPUT_POST, 'description');
            $review = filter_input(INPUT_POST, 'review');

            // Add database row
            $query = "INSERT INTO Album (artist, name, artwork, purchase_url, description, review) VALUES (:artist, :name, :artwork, :purchase_url, :description, :review);";
            $statement = $db->prepare($query);
            $statement->bindValue(':artist', $artist);
            $statement->bindValue(':name', $title);
            $statement->bindValue(':artwork', $art);
            $statement->bindValue(':purchase_url', $purchase);
            $statement->bindValue(':description', $desc);
            $statement->bindValue(':review', $review);
            $statement->execute();
            $statement->closeCursor();

            global $page;
            header("Location: $page");
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
    }

    // Show form for adding a record
    function add_subscriber_view() {
        global $page;
        return '
            <div class="card">
                <h3>Add An Album</h3>
                <form action="' . $page . '" method="post">
                    <p><label>Artist:</label> &nbsp; <input type="text" name="artist"></p>
                    <br><br>
                    <p><label>Album Title:</label> &nbsp; <input type="text" name="name"></p>
                    <br><br>
                    <p><label>Artwork URL:</label> &nbsp; <input type="text" name="artwork"></p>
                    <br><br>
                    <p><label>Purchase URL:</label> &nbsp; <input type="text" name="purchase_url"></p>
                    <br><br>
                    <p><label>Description:</label> &nbsp; <input type="text" name="description"></p>
                    <br><br>
                    <p><label>Review:</label> &nbsp; <input type="text" name="review"></p>
                    <br><br>
                    <p><input type="submit" value="Add Album"/></p>
                    <input type="hidden" name="action" value="create">
                </form>
            </div>
        ';
    }


    // Delete Database Record
    function delete_subscriber($db, $id) {
        $action = filter_input(INPUT_GET, 'action');
        $id = filter_input(INPUT_GET, 'id');
        if ($action == 'delete' and !empty($id)) {
            $query = "DELETE from Album WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $statement->closeCursor();
        }
        global $page;
        header("Location: $page");
    }
    

    // Show form for adding a record
    function edit_subscriber_view($record) {
        $id    = $record['id'];
        $artist  = $record['artist'];
        $title = $record['name'];
        $art = $record['artwork'];
        $purchase = $record['purchase_url'];
        $desc = $record['description'];
        $review = $record['review'];
        global $page;
        return '
            <div class="card">
                <h3>Edit Subscriber</h3>
                <form action="' . $page . '" method="post">
                    <p><label>Artist:</label> &nbsp; <input type="text" name="artist"></p>
                    <br><br>
                    <p><label>Album Title:</label> &nbsp; <input type="text" name="name"></p>
                    <br><br>
                    <p><label>Artwork URL:</label> &nbsp; <input type="text" name="artwork"></p>
                    <br><br>
                    <p><label>Purchase URL:</label> &nbsp; <input type="text" name="purchase_url"></p>
                    <br><br>
                    <p><label>Description:</label> &nbsp; <input type="text" name="description"></p>
                    <br><br>
                    <p><label>Review:</label> &nbsp; <input type="text" name="review"></p>
                    <br><br>
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id" value="' . $id . '">
                </form>
            </div>
        ';
    }


    // Lookup Record using ID
    function get_subscriber($db, $id) {
        $query = "SELECT * FROM Album WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $record = $statement->fetch();
        $statement->closeCursor();
        return $record;
    }


    // Handle all action verbs
    function handle_actions() {
        $id = filter_input(INPUT_GET, 'id');
        global $subscribers;
        global $log;

        // POST
        $action = filter_input(INPUT_POST, 'action');
        if ($action == 'create') {    
            $log->log('Album CREATE');                    // CREATE
            $subscribers->add();
        }
        if ($action == 'update') {
            $log->log('Album UPDATE');                    // UPDATE
            $subscribers->update();
        }

        // GET
        $action = filter_input(INPUT_GET, 'action');
        if (empty($action)) {                                  
            $log->log('Album READ');                      // READ
            return $subscribers->list_view();
        }
       if ($action == 'add') {
            $log->log('Album Add View');
            return $subscribers->add_view();
        }
        if ($action == 'clear') {
            $log->log('Album DELETE ALL');
            return $subscribers->clear();
        }
        if ($action == 'delete') {
            $log->log('Album DELETE');                    // DELETE
            return $subscribers->delete($id);
        }
        if ($action == 'edit' and ! empty($id)) {
            $log->log('Album Edit View');
            return $subscribers->edit_view($id);
        }
    }
       

    // Query for all subscribers
    function query_subscribers ($db) {
        $query = "SELECT * FROM Album";
        $statement = $db->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }


    // render_table -- Create a bullet list in HTML
    function subscriber_list_view ($table) {
        global $page;
        $s = render_button('Add An Album', "$page?action=add") . '<br><br>';
        $s .= '<table>';
        $s .= '<tr><th>Artist</th><th>Album Title</th><th>Cover Art</th><th>Purchase Link</th><th>Description</th><th>Review</th></tr>';
        foreach($table as $row) {
            $edit = render_link($row[1], "$page?id=$row[0]&action=edit");
            $title = $row[2];
            $art = $row[3];
            $purchase = $row[4];
            $desc = $row[5];
            $review = $row[6];
            $delete = render_link("delete", "$page?id=$row[0]&action=delete");
            $row = array($edit, $title, $art, $purchase, $desc, $review, $delete);
            $s .= '<tr><td>' . implode('</td><td>', $row) . '</td></tr>';
        }
        $s .= '</table>';
        
        return $s;
    }


    // Update the database
    function update_subscriber ($db) {
        $id    = filter_input(INPUT_POST, 'id');
        $artist  = filter_input(INPUT_POST, 'artist');
        $title = filter_input(INPUT_POST, 'name');
        $art = filter_input(INPUT_POST, 'artwork');
        $purchase = filter_input(INPUT_POST, 'purchase_url');
        $desc = filter_input(INPUT_POST, 'description');
        $review = filter_input(INPUT_POST, 'review');
        
        // Modify database row
        $query = "UPDATE Album SET artist = :artist, name = :name, artwork = :artwork, purchase_url = :purchase_url, description = :description, review = :review  WHERE id = :id";
        $statement = $db->prepare($query);

        $statement->bindValue(':id', $id);
        $statement->bindValue(':artist', $artist);
        $statement->bindValue(':name', $title);
        $statement->bindValue(':artwork', $art);
        $statement->bindValue(':purchase_url', $purchase);
        $statement->bindValue(':description', $desc);
        $statement->bindValue(':review', $review);

        $statement->execute();
        $statement->closeCursor();
        
        global $page;
        header("Location: $page");
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
        
        function add() {
            return add_subscriber ($this->db);  //CREATE
        }
        
        function query() {
            return query_subscribers($this->db);
        }
        
    
        function clear() {
            return clear_subscribers($this->db);
        }
        
        function delete() {
            delete_subscriber($this->db, $id);  //DELETE
        }
        
        function get($id) {
            return get_subscriber($this->db, $id);
        }
        
        function update() {
            update_subscriber($this->db); //UPDATE
        }
        
        
        // Views
        
        function handle_actions() {
            return handle_actions();
        }
        
        function add_view() {
            return add_subscriber_view();
        }
        
        function edit_view($id) {
            return edit_subscriber_view($this->get($id));
        }
        
        function list_view() {
            return subscriber_list_view($this->query());  //READ
        }
        
    }


    // Create a list object and connect to the database
    $subscribers = new Subscribers;

?>
