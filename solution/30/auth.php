<?php
 
/*
    User Auth
    
        password verification
        login
        register user
        is_logged_in
        user admin table
        
*/
    require_once 'db.php';


    // Controller for user authentication
    function handle_auth_actions() {
        global $db;
        $action = filter_input(INPUT_GET, 'action');
        if ($action == 'signup') {
            return sign_up_form();
        }
        if ($action == 'login') {
            return login_form('private.php');
        }
        if ($action == 'logout') {
            return logout('private.php?action=login');
        }
        
        $action = filter_input(INPUT_POST, 'action');
        if ($action == 'register') {
            return register_user($db);
        }
        if ($action == 'validate') {
            return validate($db, $email, $password);
        }
    }


    // Test if password is valid or not
    function validate ($db, $email, $password) {
        $email    = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        global $log;
        $log->log("Validate: $email, $password");
        if (is_valid_login ($db, $email, $password)) {
            session_start ();
            $_SESSION['LOGGED_IN'] = 'TRUE';
        }
    }


    // Check to see if user is already authenticated
    function logged_in () {
        session_start ();
        global $log;
        $log->log("logged_in: isset=" . isset($_SESSION['LOGGED_IN']));
        if (isset($_SESSION['LOGGED_IN'])) {
            $log->log("logged_in: logged_in=" . $_SESSION['LOGGED_IN']);
        }
        return (isset($_SESSION['LOGGED_IN']) and $_SESSION['LOGGED_IN']=='TRUE') ;
    }


    // Cancel the login
    function logout ($page) {
        session_start ();
        unset($_SESSION['LOGGED_IN']);
        header("Location: $page");
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
    function show_login () {
        global $log;
        if (logged_in()) {
            $log->log("User is Logged in");
            return '<h3>Is Valid</h3>';
        }
        else {
            $log->log("Bad user login");
            return '<h3>NOT Valid</h3>';
        }
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


    // Show the login
    function login_form($page) {
        global $log;
        $log->log("Show Login Form");
        
        return '
            <div class="card">
                <h3>Login</h3>
            
                <form action="' . $page . '" method="post">
                    <p><label>Email:</label> &nbsp; <input type="text" name="email"></p>
                    <p><label>Password:</label> &nbsp; <input type="password" name="password"></p>
                    <p><input type="submit" value="Login" class="btn"></p>
                    <input type="hidden" name="action" value="validate">
                    <input type="hidden" name="next" value="' . $page . '">
                </form>
            </div>
            ';
        
    }


    // Do a login if needed
    function require_login ($page){
        if (! logged_in ()) {
            header("Location: $page?action=login");
        }
    }


    // Show the sign up
    function sign_up_form($page) {
        global $log;
        $log->log("Show Sign Up Form");
        
        return '
            <div class="card">
                <h3>Sign Up</h3>
            
                <form action="' . $page . '" method="post">
                    <p><label>Email:</label> &nbsp; <input type="text" name="email"></p>
                    <p><label>Password:</label> &nbsp; <input type="password" name="password"></p>
                    <p><label>First Name:</label> &nbsp; <input type="text" name="first"></p>
                    <p><label>Last Name:</label> &nbsp; <input type="text" name="last"></p>
                    <p><input type="submit" value="Sign Up" class="btn"/></p>
                    <input type="hidden" name="action" value="register">
                    <input type="hidden" name="next" value="' . $page . '">
                    
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

       
        function register() {
            return register_user($this->db);
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
    $auth = new Authenticate($db);

?>
