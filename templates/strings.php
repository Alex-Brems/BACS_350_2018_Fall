<?php
    // strings.php -- Demonstrate string operations

    
    // String Concatonation
    echo 'UNC' . ' - BACS 350';

    $unc = 'UNC';
    $course = 'BACS 350';
    echo $unc . ' - ' . $course;

    // Double quote
    $unc = 'UNC';
    $course = 'BACS 350';
    echo "$unc - $course";

    // Show current time
    echo date('l, F, d, Y');
    echo date('Y-m-d g:i a');

    <a href=\"$url\">Visit $url</a>

    $validator_url = "$validator/nu/?doc=$url";
    echo "<a href=\"$validator_url\">Validate Page: $url</a>"
    
?>