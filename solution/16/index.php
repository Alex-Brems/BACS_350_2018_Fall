
    <?php

    require '../../views.php';

    $site_title = 'BACS 350 - Demo Server';
    $page_title = 'Directory List Design Pattern';
    begin_page($site_title, $page_title);


    // Define directory listing
    require_once 'files.php';
    require_once 'files_views.php';


    // Get the files in the current directory
    $path = filter_input(INPUT_GET, 'path');
    if (empty($path)) {
        $path = '.';
    }

    
    // Show the path selector
    echo '<h2>File Viewer</h2>';
    file_path_view($path, '.');


    // Either list the directory or show the file
    if (!file_exists($path)) {
        echo '<h2>File Path Does not Exist</h2>';
    }
    else if (is_dir($path)) {
        file_list_view($path);
    }
    else {
        file_content_view($path);
    }


    end_page();
?>
