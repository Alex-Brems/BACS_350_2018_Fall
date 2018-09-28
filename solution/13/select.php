<?php

    // Connect to the database
    require_once 'db.php';


    // Query for all subscribers
    $query = "SELECT * FROM books";

    $statement = $db->prepare($query);
    $statement->execute();

    echo '<h2>Books in List</h2>';

    // Loop over all of the subscribers to make a bullet list
    $subscribers = $statement->fetchAll();
    echo '<ul>';
    foreach ($subscribers as $s) {
        echo '<li>' . $s['id'] . ', ' . $s['title'] . ', ' . $s['author'] . '</li>';
    }
    echo '</ul>';

?>
