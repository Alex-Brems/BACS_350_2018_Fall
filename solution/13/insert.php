<?php

    // Connect to the database
    require_once 'db.php';


    // Pick out the inputs
    $title = filter_input(INPUT_GET, 'title');
    $author = filter_input(INPUT_GET, 'author');
    $summary = filter_input(INPUT_GET, 'summary');

//    echo "Title: $title, Author: $author";


    // Show if insert is successful or not
    try {
        
        // Add database row
        $query = "INSERT INTO books (title, author, summary) VALUES (:title, :author, :summary);";

        $statement = $db->prepare($query);

        $statement->bindValue(':title', $title);        
        $statement->bindValue(':author', $author);
        $statement->bindValue(':summary', $summary);

        $statement->execute();
        $statement->closeCursor();
        
        header('Location: index.php');
//        echo '<p><b>Add Book successful</b></p>';
        
        
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>Error: $error_message</p>";
        die();
    }

?>
