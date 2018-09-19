<?php

    // Start the page
    $page_title = 'BACS 350 - Project #8 - Add Records';
    require_once '../../header.php';



    // Show the list after the insert
    require 'select.php';

    echo '<p>NOTE: You may need to refresh this page in order to get the current list from the database.</p>'


    // Display subscriber records
    echo '<h2>Insert</h2>
        <a href="insert.php">Add Subscriber Record</a>';


    // End the page
    require_once '../../footer.php';

 ?>
