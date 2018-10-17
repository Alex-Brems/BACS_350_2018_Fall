<?php

    // Start the page
    require_once 'views.php';
 
    $site_title = 'BACS 350 - Demo Server';
    $page_title = 'Templates';
    begin_page($site_title, $page_title);


    // Page Content
    echo '<p><a href="..">Solutions</a></p>';
    echo '<p><a href="pagelog.php">Page Log</a></p>';
    

    // Log the page load
    require_once 'log.php';
    $log->log_page("solution/23/index.php");


    // Page Content

    echo '<h1>Templates</h1><hr>';

    // -------------------------
    // Example 1

    $text = 'str_replace("title", "Gettysburg Address", "<h3>title</h3>");';
    echo demo('Example 1 - Simple Text Replacement', $text, $text);


    // -------------------------
    // Example 2
    $text = 'file_get_contents("article.html");';
    echo demo('Example 2 - Read Template File', $text, $text);


    // -------------------------
    // Example 3

    function transform_gettysburg ($text) {
        $text = str_replace("title", "Gettysburg Address", $text);
        $text = str_replace("body", "Four score and seven years ago ...", $text);
        $text = str_replace("author", "Abe Lincoln", $text);
        return $text;
    }

    $function = '
        function transform_gettysburg($text) {
            $text = str_replace("title", "Gettysburg Address", $text);
            $text = str_replace("body", "Four score and seven years ago ...", $text);
            $text = str_replace("author", "Abe Lincoln", $text);
            return $text;
        }
    
        $text = file_get_contents("article.html"); 
        $text = transform_gettysburg($text);
    ';
    $code = 'transform_gettysburg(file_get_contents("article.html"));';
    echo demo('Example 3 - Replace Text', $function, $code);


    // -------------------------
    // Example 4

    function transform_article ($text, $title, $body, $author) {
        $text = str_replace("title",  $title,  $text);
        $text = str_replace("body",   $body,   $text);
        $text = str_replace("author", $author, $text);
        return $text;
    }

    $function = '
        function transform_article($text, $title, $body, $author) {
            $text = str_replace("title",  $title, $text);
            $text = str_replace("body",   $body,  $text);
            $text = str_replace("author", $author. $text);
            return $text;
        }
        
        $text = file_get_contents("article.html"); 
        
        transform_article($text, "Gettysburg Address", "Four score and seven years ago ...", "Abe Lincoln");
    ';

    $code = 'transform_article(file_get_contents("article.html"), 
        "Gettysburg Address", "Four score and seven years ago ...", "Abe Lincoln");';

    echo demo('Example 4 - Transform Article', $function, $code);


    // -------------------------
    // Example 5

    
    
    $function = '
        function render_article($template, $title, $body, $author) {
            $text = file_get_contents("article.html"); 
            $text = transform_article($text,, $title, $body, $author);
            return $text;
        }
        
        // Set up options
        
        $template = "article.html";
        $title = "Gettysburg Address";
        $body = "Four score and seven years ago ...";
        $author = "Abe Lincoln";
        
        // Read and transform template
        render_article($template, $title, $body, $author);
    ';

    $code = 'render_article("article.html", 
            "Gettysburg Address", 
            "Four score and seven years ago ...", 
            "Abe Lincoln");';

    echo demo('Example 5 - Render Article', $function, $code);

     
    // -------------------------
    // Example 6
   
    $function = 'array_string(array(
             "title" => "Gettysburg Address", 
            "body" => "Four score and seven years ago ...", 
            "author" => "Abe Lincoln"));';

    $code = 'array_string(array(
             "title" => "Gettysburg Address", 
            "body" => "Four score and seven years ago ...", 
            "author" => "Abe Lincoln"));';

    echo demo('Example 6 - Article Settings', $function, $code);


    // -------------------------
    // Example 7

    $settings = article_settings("Gettysburg Address", "Four score and seven years ago ...",  "Abe Lincoln");
    $text = file_get_contents("article.html"); 

    $function = '
    function transform_text ($text, $settings) {
        foreach ($settings as $key => $value) {
            $text = str_replace($key,  $value,  $text);
        }
        return $text;
    }
    
    $settings = article_settings("Gettysburg Address", 
            "Four score and seven years ago ...", 
            "Abe Lincoln");
    
    $text = transform_text($text, $settings);';

    $code = 'transform_text(file_get_contents("article.html"), 
        article_settings("Gettysburg Address", "Four score and seven years ago ...", "Abe Lincoln"));';

    echo demo('Example 7 - Transform Text', $function, $code);


    // -------------------------
    // Example 8

     $function = '
        function render_template($template, $settings) {
            $text = file_get_contents($template); 
            $text = transform_text($text, $settings);
            return $text;
        }


        $settings = article_settings("Gettysburg Address",  "Four score and seven years ago ...",  "Abe Lincoln");
        
        render_template("article.html", $settings)    
            ';
    $code = 'render_template("article.html", 
        article_settings("Gettysburg Address", "Four score and seven years ago ...", "Abe Lincoln"));';


    echo demo('Example 8 - Render Template', $function, $code);


//    // -------------------------
//    // Example 8
//
//    $function = '';
//    $code = '"TO DO";';
//
//
//    echo demo('Example 8 - Render Template', $function, $code);



    end_page();
?>
