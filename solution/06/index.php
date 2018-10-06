<?php

    require_once '../../views.php';

    $site_title = 'BACS 350 - Demo Server';
    $page_title = 'Database Connect Design Pattern';
    begin_page($site_title, $page_title);

    
    // Form the DB Connection string
    $port = '3306';
    $dbname = 'uncobacs_subscribers';
    $username = 'uncobacs_350';
    $password = 'BACS_350';
    $db_connect = "mysql:host=localhost:$port;dbname=$dbname";
    

    // Open the database or die
    echo "<h2>How to Connect to your Database</h2>" .
        "<p>Connect String:  $db_connect, $username, $password</p>";

    try {
        $db = new PDO($db_connect, $username, $password);
        echo '<p><b>Successful Connection</b></p>';
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>Error: $error_message</p>";
    }


    echo '<h2>Learn more</h2>
            <ul>
                <li><a href="..">Other Demos</a></li>
                <li><a href="https://seamansguide.com/guide/PhpApps/docs/Database.md">DB Connection Design Pattern</a></li> 
            </ul>';
    
    
    end_page();

?>
