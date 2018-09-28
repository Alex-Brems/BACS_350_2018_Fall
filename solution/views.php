<?php

    /*
        begin_page -- Create the HTML for the beginning of a page.  Add a page title and headline.
    */

    function begin_page($page_title) {

        echo '
            <!DOCTYPE html>
            <html lang="en">
                <head>

                    <meta charset="UTF-8">
                    <title>' . $page_title . '</title>

                    <link rel="stylesheet" href="../style.css">

                </head>
                <body>

                    <header>
                        <h1>
                            <img src="../Bear.png" alt="Bear Logo"/>
                            ' . $page_title . '
                        </h1>
                    </header>
                    <main>
        ';
    }


    /*
        end_page -- Create the HTML for the end of a page.
    */

    function end_page() {

        echo '
                    </main>
                </body>
            </html>
        ';

    }

?>