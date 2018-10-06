<?php 

    // Start the page
    require_once '../../views.php';

    $site_title = 'BACS 350 - Demo Server';
    $page_title = 'Database Design Pattern';
    begin_page($site_title, $page_title);


    // Your page content goes here

    echo '

        <h2>Bluehost Links</h2>
        <ul>
            <li>
                <a href="https://my.bluehost.com/cgi/app?lil=1#/">Bluehost Control Panel</a>
            </li>
            <li>
                <a href="https://cpanel-box5237.bluehost.com/cpsess7114373032/frontend/bluehost/sql/index.html">Bluehost Databases</a>
            </li>
            <li>
                <a href="https://cpanel-box5237.bluehost.com/cpsess7114373032/3rdparty/phpMyAdmin/index.php">Bluehost phpMyAdmin</a>
            </li>
        </ul>

        <h2>SQL For Creating a New Database Table</h2>

        <pre>
            CREATE TABLE subscribers (
              id small_int(3) NOT NULL AUTO_INCREMENT,
              name varchar(100)  NOT NULL,
              email varchar(100) NOT NULL,
              PRIMARY KEY (id),
            );
        </pre>
        
        
        <h2>Learn more</h2>
        <ul>
            <li><a href="..">Other Demos</a></li>
            <li><a href="https://seamansguide.com/guide/PhpApps/docs/Database.md">Database Design Pattern</a></li> 
        </ul>

    ';


    // End the page
    end_page();

?>
