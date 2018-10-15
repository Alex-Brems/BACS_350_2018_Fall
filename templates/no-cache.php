<?php

    header("Pragma: no-cache");
    header("Expires: 0");
    header("Cache-Control: no-store, no-cache, must-revalidate");

    echo '
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>' . $page_title . '</title>
                <link rel="stylesheet" href="style.css">
            </head>
            <body>
                <header>
                    <img src="Bear.png" alt="Bear Logo"/>
                </header>
                <main>
                    &lt;h1&gt;NO CACHING HERE</h1>
                    
                </main>
            </body>
        </html>
    ';

?>