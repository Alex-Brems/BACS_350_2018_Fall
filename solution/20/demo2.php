<?php

    $title = 'Demo 2 - Word Match Using Regex';
    $code = '$words = ["ban", "babble", "make", "flab"];
$regex = "/ab/";
$result = "";
foreach ($words as $word) {
   if (preg_match($regex, $word)) {
      $result .= "$word matches!\n";
   }
}';

    $words = ["ban", "babble", "make", "flab"];
    $regex = "/ab/";

    $result = "";
    foreach ($words as $word) {
       if (preg_match($regex, $word)) {
          $result .= "$word matches!\n";
       }
    }

    show_demo_code($title, $code, $result);

    echo '</pre></div>';


?>
