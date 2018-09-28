<?php

    // Connect to the database
    require_once 'db.php';


    // Query for all subscribers
    $query = "SELECT * FROM log";

    $statement = $db->prepare($query);
    $statement->execute();

    echo '<h2>Page Log History</h2>';

    // Loop over all of the entries
    $log = $statement->fetchAll();
    echo '<ul>';
    foreach ($log as $s) {
        echo '<li>' . $s['date'] . ', ' . $s['text'] . '</li>';
    }
    echo '</ul>';

?>
