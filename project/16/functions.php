<?php 

    //header info here
    function page_header($page_title) {

        echo '
        <!DOCTYPE html>
        <html>
            <head>
                <title>' .$page_title . '</title>
                <link rel="stylesheet" type="text/css" href="styles.css">
            </head>
            <body>
                <main>';

    }

    //footer info here
    function page_footer() {
        
        echo '
                    </main>
                </body>
            </html>';

    }

?>