<?php

    /*
        begin_page -- Create the HTML for the beginning of a page.  Add a page title and headline.
    */

    function begin_page($site_title, $page_title) {

        echo '
            <!DOCTYPE html>
            <html lang="en">
                <head>

                    <meta charset="UTF-8">
                    <title>' . $page_title . '</title>

                    <link rel="stylesheet" href="/bacs_350/style.css">

                </head>
                <body>

                    <header>
<<<<<<< HEAD
                        <h1>
                            <img src="/Bear.png" alt="Bear Logo"/>
                            ' . $page_title . '
                        </h1>
                        <p>TEST</p>
=======
                        <img src="/bacs_350/images/Bear.png" alt="Bear Logo"/>
                        <h1>' . $site_title . '</h1>
                        <h2>' . $page_title . '</h2>
>>>>>>> d8fddb3b3355daeefe501bc3da3d5a404d8043d2
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
