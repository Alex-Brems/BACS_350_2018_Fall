<?php

    /*
        add_note_form -- Create an HTML form to add record.
    */

    function add_note_form() {
        
        echo '
            <div class="card">
                <h3>Add A BearNote</h3>
            
                <form action="insert.php" method="post">
                    <p><label>Title:</label> &nbsp; <input type="text" name="title"></p>
                    <br><br>
                    <p><label>Date:</label> &nbsp; <input type="date" name="date"></p>
                    <br><br>
                    <p><label>Body:</label> &nbsp; <input type="text" name="body"></p>
                    <br><br>
                    <p><input type="submit" value="Sign Up"/></p>
                </form>
            </div>
            ';
        
    }


    
    /*
        render_list -- Loop over all of the subscribers to make a bullet list
    */
 
    function render_list($list) {

        echo '
            <div class="card">
                <h3>Current BearNotes:</h3> 
                <ul>
            ';
        foreach ($list as $s) {
            echo '<li>' . $s['id'] . ', ' . $s['title'] . ', ' . $s['date'] . ', ' . $s['body'] .'</li>';
        }
        echo '
                </ul>
            </div>';
    
    }
    

?>