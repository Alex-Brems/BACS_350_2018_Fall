<?php
    // files.php -- Utility functions for files


    // Return the files in directory

    function get_file_list($path) {
        $files = array();
        if (!is_dir($path)) { return $files; }

        $items = scandir($path);
        foreach ($items as $item) {
             $item_path = $path . DIRECTORY_SEPARATOR . $item;
             if (is_file($item_path)) {
                 $files[] = $item;
             }
        }
        return $files;
    }


    // Return the directory listing

    function get_dir_list($path) {
        $files = array();
        if (!is_dir($path)) { return $files; }

        $items = scandir($path);
        foreach ($items as $item) {
             $item_path = $path . DIRECTORY_SEPARATOR . $item;
             if (is_dir($item_path)) {
                 $files[] = $item;
             }
        }
        return $files;
    }


    // Return the file contents
    // $text = read_file('index.php');
    // file_put_contents('/ex04.php', read_file('index.php'));

    function read_file($path) {
        $text = file_get_contents($path);
        $text = htmlspecialchars($text);
        return $text;
    }
    
?>