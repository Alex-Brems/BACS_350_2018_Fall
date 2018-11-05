<?php
 
    // Set the password into the administrator table
    function register_user($db, $email, $password, $first, $last) {
        
        global $log;
        $log->log("$email, $first, $last");
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


    // Display if password is valid or not
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



    // My log list
    class Authenticate {

        private $db;

        function __construct($db) {
            $this->db =  $db;
        }

        function validate($email, $password) {
            return is_valid_login($this->db, $email, $password);
        }
        
        function register($email, $password, $first, $last) {
            return register_user($this->db, $email, $password, $first, $last);
        }
        
        function show_valid ($email, $password) {
            return show_valid ($this->db, $email, $password);
        }
    }


    // Create a list object and connect to the database
    require_once 'db.php';
    $auth = new Authenticate($db);

?>
