<?php
    
    $title = 'Demo 1 - Text Replace';

    $code = 'str_replace("is", "at", "This is it");
echo $result;';

    $result = str_replace("is", "at", "This is it");

    show_demo_code($title, $code, $result);
    
?>
