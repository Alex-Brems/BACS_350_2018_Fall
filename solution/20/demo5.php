<?php

    $title = 'Demo 5 - Text Lines';


    $presidents = "George Washington
Abe Lincoln
Andrew Jackson
FDR
JFK";
    
    $code = '$presidents = "George Washington
Abe Lincoln
Andrew Jackson
FDR
JFK";

// Split Lines
$lines = explode("\n", $presidents);

// Join Lines
echo implode(", ", $lines);
';


    $result = explode("\n", $presidents);
    $result = implode(", ", $result);
    
    show_demo_code($title, $code, $result);

?>
