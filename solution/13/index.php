 <?php

// Start the page
    $page_title = 'BACS 350 - Project #13 - Apps';
    require_once '../../header.php';

    // Display the To Do list during development
    require 'todo.html';

    echo '<h2>Build Apps</h2>';

    require 'db.php';


    // Show the list after the insert
//    require 'select.php';


    // Show links for page testing
    require 'test.php';


    // End the page
    require_once '../../footer.php';

?>