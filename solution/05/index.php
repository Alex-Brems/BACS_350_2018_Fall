<?php

    // Setup a page title variable
    $page_title = "BACS 350 - Project #5 - Form View";

    // Include the page start
    include '../../header.php';
?>

    <h2>UI for form input using POST</h2>

    <form action="welcome.php" method="post">
        
        <p><label>What is your name?</label> &nbsp; <input type="text" name="my_name"></p>
        
        <p><input type="submit" value="Save"/></p>
        
    </form>

<?php
    // Include the page end
    include '../../footer.php';
?>
