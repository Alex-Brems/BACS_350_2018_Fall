<?php

    $title = 'Demo 6 - Page Template';


    $template = '<h1>{{ title }}</h1><p>{{ text }}</p>';
    $code = '$template = "' . htmlspecialchars($template) . '";
    
$template = str_replace("{{ title }}", "Gettysburg", $template);
$template = str_replace("{{ text1}}", "Four score and seven years ago ...
... with liberty and justice for all.", $template);';


    $template = str_replace('{{ title }}', 'Gettysburg', $template);
    $template = str_replace('{{ text }}', "Four score and seven years ago... 
... with liberty and justice for all.", $template);

    show_demo_code($title, $code, $template);

?>
