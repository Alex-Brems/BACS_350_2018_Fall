<?php

    // Setup a page title variable
    $page_title = "BACS 350 - Project #9 - App UI";

    // Include the page start
    include '../../header.php';
?>

    <h2>Subscriber Application</h2>

    <!-- Display subscriber records  -->
    require 'select.php';


    <h2>Register</h2>

    <form action="welcome.php" method="post">
        
        <p><label>Name:</label> &nbsp; <input type="text" name="name"></p>
        <p><label>Email:</label> &nbsp; <input type="text" name="email"></p>
        
        <p><input type="submit" value="Register"/></p>
        
    </form>

<?php
    // Include the page end
    include '../../footer.php';
?>
