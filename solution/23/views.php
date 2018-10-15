<?php

     /*
        article_settings -- Create the HTML page for one article.
    */
    function article_settings($title, $body, $author) {
        return array(
            "title" => $title, 
            "body" => $body, 
            "author" => $author
        );
    }
    

     /*
        array_string -- Format an array as a string
    */
    function array_string($array) {
        $s = 'array(';
        foreach ($array as $key => $value) {
            $s .= "\"$key\"  => \"$value\",\n    ";
        }
        $s .= ')';
        return $s;
    }

    
   /*
        begin_page -- Create the HTML for the beginning of a page.  Add a page title and headline.
    */
    function begin_page($site_title, $page_title) {

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
                        <h1>' . $site_title . '</h1>
                        <h2>' . $page_title . '</h2>
                    </header>
                    <main>
        ';
    }


    /*
        demo -- Demonstrate executing PHP code
    */
   function demo($title, $source, $code) {
        eval ('$result = ' . $code);
        return "<h2>$title</h2>" .  
            '<p><b>Source: </b><pre>' . htmlspecialchars($source) . '</pre></p>' .
            '<p><b>Result:</b><pre>' . htmlspecialchars(eval('return ' . $code)) . '</pre></p><hr>';
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


    /*
        render_article -- Create the HTML page for one article.
    */
    function render_article($template, $title, $body, $author) {
        $text = file_get_contents("article.html"); 
        $text = transform_article($text, $title, $body, $author);
        return $text;
    }


    /*
        render_simple_page -- Create the HTML page.
    */
    function render_simple_page($title, $text) {
        
        echo "<h1>$title</h1><p>$text</p>";
    }


    /*
        render_template -- Convert template file using the settings
    */
   function render_template($template, $settings) {
        $text = file_get_contents($template); 
        $text = transform_text($text, $settings);
        return $text;
    }

   
    /*
        transform_text -- Convert each setting in a block of text
    */
    function transform_text ($text, $settings) {
        foreach ($settings as $key => $value) {
            // echo "$key => $value"; 
            $text = str_replace($key,  $value,  $text);
        }
        return $text;
    }


?>
