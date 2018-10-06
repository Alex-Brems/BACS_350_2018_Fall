<?php

    require_once '../../views.php';

    $site_title = 'BACS 350 - Demo Server';
    $page_title = 'Form Input Design Pattern';
    begin_page($site_title, $page_title);


    // Grab the name
    $name = filter_input(INPUT_POST, 'my_name');

    echo '<h1>View to Accept Data</h1> 
        <h3>Welcome back, ' . $name . '</h3>';


    end_page();

?>
