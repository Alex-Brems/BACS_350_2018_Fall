<?php

    $title = 'Demo 4 - Regex Replace';
    $code = '$text = "A stitch in time saves nine.";
$regex = "/\wi\we/";
preg_replace($regex, "TIME", $text);';

    // Get result
    $text = "A stitch in time saves nine.";
    $regex = "/\wi\we/";
    $result = preg_replace($regex, "TIME", $text);

    show_demo_code($title, $code, $result);


    $code = '$phoneNum = "(123) 456-7890";
preg_replace("/\D+/", "", $phoneNum);';

    // Get result
    $phoneNum = "(123) 456-7890";
    $result = preg_replace("/\D+/", "", $phoneNum);

    show_demo_code($title, $code, $result);

?>
