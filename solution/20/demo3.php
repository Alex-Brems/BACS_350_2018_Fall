<?php

    $title = 'Demo 3 - Text Replace';
    $code = '$text = "A stitch in time saves five.";
$regex = "/five/";
echo preg_replace($regex, "NINE", $text);
';

    // Get result
    $text = "A stitch in time saves five.";
    $regex = "/five/";
    $result = preg_replace($regex, "NINE", $text);


    show_demo_code($title, $code, $result);

?>
