<?php

    require_once 'views.php';


    // Log the page load
    require_once 'log.php';
    $log->log_page("solution/26");

  

    // -----------------------------
    //  ERRORS
    // -----------------------------
    
    // There are two types of errors that are handled in PHP.
    // Learn to use each of them with the following examples.


    // -----------------------------
    // Handle File Errors

    set_error_handler("errorHandler");

    function errorHandler($errno, $errstr) {
        echo "<p>Error $errno: $errstr</p>";
        global $log;
        $log->log_page("PHP Error: $errstr");
    }


//    try {
//        xxx; 
//    }
//    catch (Exception $e) {
//        $log->log_page("Exception: $path");
//    }
//
//    // This should log an error message
//    xxx; 

    // This should log success
    $path = 'page.html';
    $text = file_get_contents($path);
    $log->log_page("File read: $path\n$text");
    $template = render_card("Page Template", htmlspecialchars($text));


//    // This should log an error message
//    $path = 'xxx';
//    file_get_contents($path);
//    $log->log_page("File read: $path");


    // -----------------------------
    // Handle Database Errors
    
    $host = 'localhost';
    $dbname = 'bacs350';
    $username = 'root';
    $password = '';
    $db_connect = "mysql:host=$host;dbname=$dbname";

//    // This attempt should succeed
    try {
        $db = new PDO($db_connect, $username, $password);
        $log->log_page("Database connect: $db_connect");
    }
    catch (PDOException $e) {
        $error_message = $e->getMessage();
        $log->log_page("Database Error: $error_message, $password");
        echo "Error: $error_message, $password";
    }
//
//    // This attempt should fail
//    try {
//        $password = 'bad to the bone';
//        $db = new PDO($db_connect, $username, $password);
//        $log->log_page("Database connect: $db_connect");
//    } 
//    catch (PDOException $e) {
//        $error_message = $e->getMessage();
//        $log->log_page("Database Error: $error_message, $password");
//        echo "Error: $error_message, $password";
//    }


   
    // Create main part of page content
    $settings = array(
        "site_title" => "BACS 350 Projects",
        "page_title" => "Error Handling Demos", 
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);


?>
