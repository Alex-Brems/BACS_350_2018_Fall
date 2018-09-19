 <?php

    // Start the page
    $page_title = 'BACS 350 - Project #10 - Testing';
    require_once '../../header.php';



    // Show the list after the insert
    require 'select.php';


    // Show links for page testing
    $domain = 'unco-bacs.org';
    $test_page = 'bacs_350/solution/10/index.php';

    require 'test.php';


    // End the page
    require_once '../../footer.php';

?>