<?php
    // files.php -- Utility functions for files

    require_once 'files.php';


    // Show the form and create data to post

    function file_path_view($path, $page) {
        echo '
            <div class="card">
                <h3>Select File Path</h3>

                <form action="' . $page . '" method="get">
                    <p><input type="text" name="path" value="' . $path . '"></p>
                    <p><input type="submit" value="Browse"/></p>
                </form>
            </div>
        ';
    }


    // File list view

    function file_list_view($path) {

        if (!file_exists($path)) {
            echo '<h2>File Path Does not Exist</h2>';
        }

        // Either list the directory or show the file
        else if (is_dir($path)) {
            $files = get_file_list($path);

            echo '<div class="card"><h3>Files in Directory</h3>';

            // List the files as links
            if (count($files) == 0) :
                echo '<p>No images uploaded.</p>';
            else:
                echo '<ul>';

                foreach($files as $filename) :
                    $file_url = '.?path=' . $path . '/' . urlencode($filename);
                    echo '<li><a href="' . $file_url . '">' . $filename . '</a></li>';
                endforeach;

                echo '</ul>';
            endif;
            echo '</div>';
        }
    }


    // File content view

    function file_content_view($path) {
        echo '<div class="card"><h3>Source Code - ' . $path . '</h3>';
        $text = read_file($path);
        echo '<pre>' . $text . '</pre></div>';
    }

    
?>