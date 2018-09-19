<?php 

    $page_title = "BACS 350 - Project #4 - Databases";

    include "../../header.php"; 

?>

    <!--  Your code goes here -->
    <h1>BACS 350 - Project #4 - Databases</h1>

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

<?php include "../../footer.php"; ?>