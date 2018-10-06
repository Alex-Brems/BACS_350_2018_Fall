<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <title>Web Hosting Demo</title>

        <link rel="stylesheet" href="style.css">

    </head>
    <body>

        <header>
            <img src="Bear.png" alt="Bear Logo"/>
            <h1>BACS 350 - Demo Server</h1>
            <h2>Web Hosting Demo</h2>
        </header>
        <main>

            <?php

                /*
                    This page is an example of a raw HTML file being included as the output of the PHP page.
                    Notice that no page styling is done.

                    The Include Pattern inserts content from one HTML or PHP file directly into another PHP
                    file being processed.

                    A PHP server is required to properly display this content.  If the PHP preprocessor is
                    not running then the source code for this page will be displayed.
                */

                include 'pattern.html';

            ?>

        </main>
    </body>
</html>