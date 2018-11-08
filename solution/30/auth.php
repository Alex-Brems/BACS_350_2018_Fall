<?php
 
/*
    User Auth
    
        password verification
        login
        register user
        is_logged_in
        user admin table
        
*/

    // Controller for user authentication
    function handle_auth_actions($auth) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == 'signup') {
            return $auth->sign_up_form();
        }
        if ($action == 'login') {
            return $auth->login_form();
        }
        
        $action = filter_input(INPUT_POST, 'action');
        if ($action == 'register') {
            return $auth->register_user();
        }
        if ($action == 'validate') {
            return $auth->validate($email, $password);
        }
    }


    // Test if password is valid or not
    function validate ($db, $email, $password) {
        return is_valid_login ($db, $email, $password);
    }


    // Set the password into the administrator table
    function register_user($db) {
        
        $email    = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $first    = filter_input(INPUT_POST, 'first');
        $last     = filter_input(INPUT_POST, 'last');
        
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

    function login_form() {
        global $log;
        $log->log("Show Login Form");
        
        return '
            <div class="card">
                <h3>Login</h3>
            
                <form action="index.php" method="post">
                    <p><label>Email:</label> &nbsp; <input type="text" name="email"></p>
                    <p><label>Password:</label> &nbsp; <input type="password" name="password"></p>
                    <p><input type="submit" value="Login" class="btn"/></p>
                </form>
            </div>
            ';
        
    }

    function sign_up_form() {
        global $log;
        $log->log("Show Sign Up Form");
        
        return '
            <div class="card">
                <h3>Sign Up</h3>
            
                <form action="index.php" method="post">
                    <p><label>Email:</label> &nbsp; <input type="text" name="email"></p>
                    <p><label>Password:</label> &nbsp; <input type="password" name="password"></p>
                    <p><label>First Name:</label> &nbsp; <input type="text" name="first"></p>
                    <p><label>Last Name:</label> &nbsp; <input type="text" name="last"></p>
                    <p><input type="submit" value="Sign Up" class="btn"/></p>
                </form>
            </div>
            ';
        
    }



/*
    Object API for Authentication
    
    usage: 
        require_once 'auth.php';  // Setup auth code
        
        $auth->require_login();   // Go to login if needed
        $auth->logout();          // Clear the session
        $auth->sign_up();         // Sign up form for new user
        
*/

    // My log list
    class Authenticate {

        private $db;

        function __construct($db) {
            $this->db =  $db;
        }

        function handle_actions() {
            return handle_auth_actions($this);
        }
        
        
//        function ($email, $password) {
//            return is_valid_login($this->db, $email, $password);
//        }
        
        function register() {
            return register_user($this->db);
        }
        
        function show_valid ($email, $password) {
            return show_valid ($this->db, $email, $password);
        }
        
        function require_login() {
            if (! $this->logged_in()) {
                header ('Location: login.php');
            }
        }
        
        function validate ($email, $password) {
            return validate ($this->db, $email, $password);
        }

    }


    // Create a list object and connect to the database
    require_once 'db.php';
    $auth = new Authenticate($db);

?>
