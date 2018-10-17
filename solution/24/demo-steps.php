<?php

    function render_page_content() {
        
    // Start the page
    require_once 'views.php';
 
    
    // Page Content

    echo '<h1>Page Templates</h1><p>Building on basic template to create whole pages</p>';


    // -------------------------
    // Step 1 - Replacement Settings

    $function = '
        $gettysburg = array(
            "title" => "Gettysburg Address", 
            "body" => "Four score and seven years ago ...", 
            "author" => "Abe Lincoln");';

    $code = 'array_string(array(
            "title" => "Gettysburg Address", 
            "body" => "Four score and seven years ago ...", 
            "author" => "Abe Lincoln"));';

    echo demo('Step 1 - Replacement Settings', $function, $code);

 
    // -------------------------
    // Step 2 - Read Template

    $function = '
        function transform_text ($text, $settings) {
            foreach ($settings as $key => $value) {
                $text = str_replace("{{ $key }}",  $value,  $text);
            }
            return $text;
        }

        $text = file_get_contents("article.html");';
    $code = 'file_get_contents("article.html");';

    echo demo('Step 2 - Read Template', $function, $code);


    // -------------------------
    // Step 3 - Render Template

    $function = '
        function render_template($template, $settings) {
            $text = file_get_contents($template); 
            $text = transform_text($text, $settings);
            return $text;
        }

        render_template("article.html", $gettysburg)    
            ';

    $code = '
        render_template("article.html", 
            array(
                "title" => "Gettysburg Address", 
                "body" => "Four score and seven years ago ...", 
                "author" => "Abe Lincoln"));';


    echo demo('Step 3 - Render Template', $function, $code);


    // -------------------------
    // Step 4 - Page Template


    $function = '$text = file_get_contents("page.html");';
    $code = 'file_get_contents("page.html");';

    echo demo('Step 4 - Read Page Template', $function, $code);


    // -------------------------
    // Step 5 - Inject Page Settings


    $function = '
        $settings = array("page_title" => "Page Templates",  
                          "site_title" => "BACS 200 Demos");
                          
        $text = render_template("page.html", $settings);
        ';

    $code = 'render_template("page.html", array(
                "page_title" => "Page Templates", 
                "site_title" => "BACS 200 Demos"));';

    echo demo('Step 5 - Inject Page Settings', $function, $code);


    // -------------------------
    // Step 6 - Inject Content


    $function = '
        $settings = array("page_title" => "Page Templates",  
                          "site_title" => "BACS 200 Demos",
                          "content"    => $gettyburg_text);
                  
        $text = render_template("page.html", $settings);
        ';
    
    $code = 'render_template("page.html", array(
                "page_title" => "Page Templates", 
                "site_title" => "BACS 200 Demos",
                "content"    => 
                    render_template("article.html", 
                        array(
                            "title" => "Gettysburg Address", 
                            "body" => "Four score and seven years ago ...", 
                            "author" => "Abe Lincoln"))));';

    echo demo('Step 5 - Inject Content', $function, $code);


    

    // -------------------------
    // Step 7 - Render Page


    $function = '
        function render_page($content) {
            return render_template("page.html", $content));
        }
        
        $gettyburg_text = array(
            "title" => "Gettysburg Address", 
            "body" => "Four score and seven years ago ...", 
            "author" => "Abe Lincoln");

        render_page($gettyburg_text);';
        
    $code = 'render_template("page.html", array(
                "page_title" => "Page Templates", 
                "site_title" => "BACS 200 Demos",
                "content"    => 
                    render_template("article.html", 
                        array(
                            "title" => "Gettysburg Address", 
                            "body" => "Four score and seven years ago ...", 
                            "author" => "Abe Lincoln"))));';

    echo demo('Step 7 - Render Page', $function, $code);


//    // -------------------------
//    // Step x - 
//
//
//    $function = ';';
//    $code = ';';
//
//    echo demo('', $function, $code);

    }

?>
