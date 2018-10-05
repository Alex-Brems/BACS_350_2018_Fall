<?php

    /*
        add_log_form -- Create an HTML form to add record.
    */

    function add_log_form() {
        
        echo '
            <div class="card">
                <h3>Add log</h3>
            
                <form action="insert.php" method="post">
                    <p><label>Text:</label> &nbsp; <input type="text" name="text"></p>
                    <p><input type="submit" value="Sign Up"/></p>
                </form>
            </div>
            ';
        
    }


    
    /*
        render_list -- Loop over all of the log to make a bullet list
    */
 
    function render_list($list) {

        echo '
            <div class="card">
                <h3>Page Load History</h3> 
                <ul>
            ';
        foreach ($list as $s) {
            echo '<li>' . $s['id'] . ', ' . $s['date'] . ', ' . $s['text'] . '</li>';
        }
        echo '
                </ul>
            </div>';
    
    }
    

?>