<?php

    /*
        add_album_form -- Create an HTML form to add record.
    */

    function add_album_form() {
        
        echo '
            <div class="card">
                <h3>Add An Album</h3>
            
                <form action="insert.php" method="post">
                    <p><label>Artist:</label> &nbsp; <input type="text" name="artist"></p>
                    <br><br>
                    <p><label>Album Title:</label> &nbsp; <input type="text" name="name"></p>
                    <br><br>
                    <p><label>Artwork URL:</label> &nbsp; <input type="text" name="artwork"></p>
                    <br><br>
                    <p><label>Purchase URL:</label> &nbsp; <input type="text" name="purchase_url"></p>
                    <br><br>
                    <p><label>Description:</label> &nbsp; <input type="text" name="description"></p>
                    <br><br>
                    <p><label>Review:</label> &nbsp; <input type="text" name="review"></p>
                    <br><br>
                    <p><input type="submit" value="Add Album"/></p>
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
                <h3>Current Albums:</h3> 
            ';
        foreach ($list as $s) {
            echo '
            <div class="card">
            <p>
                Album: ' . $s['name'] . ' 
                <br>
                Artist: ' . $s['artist'] . '
                <br>
                <img src=" ' . $s['artwork'] . ' " alt="Album Cover Art" height="200" width="200">
                <br>
                <a href=" ' . $s['purchase_url'] . ' ">Purchase ' . $s['name'] . '</a>
                <br>
                Description: ' . $s['description'] . '
                <br>
                Review: ' . $s['review'] . '
            </p>
            </div>
            ';
            //echo '<li>' . $s['id'] . ', <br> ' . $s['artist'] . ', <br> ' . $s['name'] . ', <br> ' . $s['artwork'] .', <br> ' . $s['purchase_url'] . ', <br>' . $s['description'] . ', <br>' . $s['review'] . '</li>';
        }
        echo '
            </div>';
    
    }
    

?>