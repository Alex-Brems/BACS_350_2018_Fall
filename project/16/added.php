<?php

    //require the functions
    require_once 'functions.php';
        
    // Setup a page title variable
    $page_title = "Project #16 Index";

    // Include the page start
    page_header($page_title);

    // Connect to the database
    require_once 'db.php';

?>

<h2>User Added!</h2>
<p>
    Name: <?php echo $_POST["name"]; ?>
    <br>
    Email: <?php echo $_POST["email"]; ?>
</p>

<?php

    // Add new record
    $name = $_POST["name"];
    $email = $_POST["email"];


    // Add database row
    $query = "INSERT INTO proj16subs (name, email) VALUES (:name, :email);";

    $statement = $db->prepare($query);

    $statement->bindValue(':name', $name);
    $statement->bindValue(':email', $email);

    $statement->execute();
    $statement->closeCursor();


    // Display subscriber records
    require 'select.php';

?>

<a href="index.php">Back to the Subscribers Index</a>

<?php

    // Include the page end
    page_footer();

?>