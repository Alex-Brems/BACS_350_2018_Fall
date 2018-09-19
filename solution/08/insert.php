<?php


    // Start the page
    $page_title = 'BACS 350 - Project #8 - Add Records';
    require_once '../../header.php';


    // Connect to the database
    require_once 'db.php';


    // Show heading
    echo '<h2>Add Test User</h2>';


    // Add new record
    $name = 'Test User';
    $email = 'tester@gmail.com';


    // Show if insert is successful or not
    try {
        
        // Add database row
        $query = "INSERT INTO subscribers (name, email) VALUES (:name, :email);";

        $statement = $db->prepare($query);

        $statement->bindValue(':name', $name);
        $statement->bindValue(':email', $email);

        $statement->execute();
        $statement->closeCursor();
        
        echo '<p><b>Insert successful</b></p>';
        
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>Error: $error_message</p>";
        die();
    }    


    // Manually return to show list
     echo '<a href="index.php">Show List</a>';
    

    // End the page
    require_once '../../footer.php';

?>
