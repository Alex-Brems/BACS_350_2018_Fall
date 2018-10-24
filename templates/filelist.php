<?php

    require_once 'views.php';


    // Include the main page content

    $path = filter_input(INPUT_GET, 'path');
    
    $text = '<h2>Files in Templates</h2>
        <p>This demo shows how to list all of the files within a directory.</p>
        <p>Directory Path = ' . $path;


    // Define directory listing
    require_once 'files.php';

    // Get the files in the current directory
    $files = get_file_list($path);

    $content = render_list($files);

     
    $settings = array(
        "site_title" => "BACS 350 Templates",
        "page_title" => "File List", 
        "style"      => 'style.css',
        "content"    => $text . $content);

    echo render_page($settings);

?>
