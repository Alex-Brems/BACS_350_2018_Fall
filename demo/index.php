<?php

    require_once 'views.php';
    require_once 'db.php';    
    require_once 'log.php';


    function register_user($db, $email, $password, $first, $last) {
        
        global $log;
        $hash = password_hash($password, PASSWORD_DEFAULT);
        
        $query = 'INSERT INTO administrators (email, password, firstName, lastName) 
            VALUES (:email, :password, :first, :last);';
        
        $statement = $db->prepare($query);
        
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $hash);
        $statement->bindValue(':first', $first);
        $statement->bindValue(':last', $last);
        
        $statement->execute();
        $statement->closeCursor();
    
    }

    // Check to see that the password in OK
    function is_valid_login ($db, $email, $password) {
        
        global $log;
        $query = 'SELECT password FROM administrators WHERE email=:email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        $hash = $row['password'];
        $log->log("User login check: $email, $hash");
        return password_verify($password, $hash);
        
    }

    function show_valid ($db, $email, $password) {
        
        global $log;
        $content = "<p>User: $email</p><p>Password: $password</p>";
        $valid_password = is_valid_login ($db, $email, $password);
        
        if ($valid_password) {
            $log->log("User Verified: $email");
            $content .= '<p>Is Valid</p>';
        }
        else {
            $log->log("Bad user login: $email");
            $content .= '<p>NOT Valid</p>';
        }
        return $content;
        
    }

    $user = "Inigo";
    $password = "Montoya";

    //register_user($db, $user, $password, $user, $password);


    $hash = password_hash($password, PASSWORD_DEFAULT);
    $content = show_valid($db, $user, $password);

    // Create main part of page content
    $settings = array(
        "site_title" => "BACS 350 Projects",
        "page_title" => "Date and TimeZone", 
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);

?>
