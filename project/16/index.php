<?php

    //require the functions
    require_once 'functions.php';

    // Setup a page title variable
    $page_title = "Project #16 Index";

    // Include the page start
    page_header($page_title);

    // Include the main page content
    echo '<body><h1>BACS 350 - PROJECT #16: Subscribers Application </h1></body>';

    //require the database connection
    require_once 'db.php';

    //require the select php
    require_once 'select.php';

    //require the insert
    require_once 'insertuser.php';

    // Include the page end
    page_footer();

 ?>