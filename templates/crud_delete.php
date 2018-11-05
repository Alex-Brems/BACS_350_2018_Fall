<?php

    // Connect to the database
    require_once 'db.php';

    // Modify Database Record
    $action = filter_input(INPUT_GET, 'action');
    $id = filter_input(INPUT_GET, 'id');
    if ($action == 'delete' and !empty($id)) {

        // Delete database row
        $query = "DELETE from subscribers WHERE id = :id";

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $statement->closeCursor();

    }
   
   header('Location: crud_read.php');

?>
