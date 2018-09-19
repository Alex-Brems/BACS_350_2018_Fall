<?php
    $name = filter_input(INPUT_POST, 'my_name');

    // Setup a page title variable
    $page_title = "View to Accept Data";

    // Include the page start
    include '../../header.php';
?>

    <h2>Welcome back, <?php echo $name; ?></h2>

<?php
    // Include the page end
    include '../../footer.php';
?>
