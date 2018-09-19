<?php
    // Setup a page title variable
    $page_title = "Thank You for Registering";

    // Include the page start
    include '../../header.php';

    // Get the parameters
    $name = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email');

    // Add record to Database
    require 'insert.php';
?>

    <h2>Welcome aboard, <?php echo $name; ?></h2>
    <h3>Your Profile</h3>
    <p><label>Name:</label><b><?php echo "$name"?></b></p>
    <p><label>Email:</label><b><?php echo "$email"?></b></p>

    
<?php
    // Include the page end
    include '../../footer.php';
?>
