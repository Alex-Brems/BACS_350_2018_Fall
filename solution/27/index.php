<?php

    require_once 'views.php';


//    // Log the page load
//    require_once 'log.php';
//    $log->log_page("solution/27");

//    if (! isset($_COOKIE['FIRST_TIME'])) {
//        $_COOKIE['FIRST_TIME'] = "FALSE");
//    } 
//        
//
//    if (! isset($_SESSION['SHOPPING'])) {
//        $_SESSION['SHOPPING'] = 'FALSE';
//    }
//        
//    $log->log_page( "solution/27  Cookie First: $_COOKIE[FIRST_TIME]");
//    $log->log_page( "solution/27  Cookie Shopping: $_COOKIE[SHOPPING]");


    // -----------------------------
    // Cookies
    // -----------------------------

    function show_first_time() {
        setcookie ('FIRST_TIME', 'FALSE');
        return 'We see this is your First Time.   Sign up now to make all of your dreams come true.';
    }

    function show_not_first_time() {
//        setcookie ('FIRST_TIME', 'TRUE');
        return 'NOT First time';
        
    }

    function show_buy_now() {
        return 'Buy Now.    Sign up now to make all of your dreams come true.  
            <a href="index.php?shopping=TRUE">BUY</a>';
    }

    function show_shopping_cart() {
        return 'You Bought this.  <a href="index.php?shopping=FALSE">CANCEL</a>';
    }


    // Handle first time
    
    $before = "Before: Cookie = $_COOKIE[FIRST_TIME]";

    $content = "<h1>Demo of Cookies and Sessions</h1>";
    
//    if (! isset($_COOKIE['FIRST_TIME']) or $_COOKIE['FIRST_TIME'] == "TRUE") {
//        $message = show_first_time();
//    }
//    else {
//        $message = show_not_first_time();
//    }
//    $content .= render_card ("Welcome",$message);
//
//
//    // Handle Shopping Cart
//
//    $shopping = filter_input(INPUT_GET, 'shopping');
//
//    if ($shopping == 'TRUE') {
//        session_start ();
//        $_SESSION['SHOPPING'] = 'TRUE';
//    }
//    else {
//        $_SESSION['SHOPPING'] = 'FALSE';
//    }
//
//    if (isset($_SESSION['SHOPPING']) and $_SESSION['SHOPPING']=='TRUE') {
//        $message =  show_shopping_cart();
//    }
//    else {
//        $message =  show_buy_now();
//    }
//    $content .= render_card ("PURCHASE", $message);
//    
//    $after = "After: Cookie = $_COOKIE[FIRST_TIME]";
//    $status = render_card("Cookies", $before . $after);



    // Create main part of page content
    $settings = array(
        "site_title" => "BACS 350 Projects",
        "page_title" => "Cookies & Sessions", 
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);


?>
