<?php

    // Start the page
    require_once 'views.php';
 
    $site_title = 'BACS 350 - Alex Brems';
    $page_title = 'Quiz 2 - GitHub & GitBash';
    begin_page($site_title, $page_title);

    //Screenshots 1-5
    echo '
    <a href = "http://puu.sh/BNhnm/2ab60ca76e.png">1. Create your repo<a>
    <br><br>
    <a href = "http://puu.sh/BNiw1/61f15c9088.png">2. Show that your local repo is working<a>
    <br><br>
    <a href = "http://puu.sh/BNiyz/db0b384378.png">3. Show that Github desktop is installed correctly<a>
    <br><br>
    <a href = "http://puu.sh/BNj0M/844a825bc9.png">4. Show me you can use the command-line<a>
    <br><br>
    <a href = "http://puu.sh/BNj6h/2e38a6c8a1.png">5. Sync upstream changes<a>
    ';



    end_page();
?>
