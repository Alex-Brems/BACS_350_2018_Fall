<?php

    // Start the page
    require_once 'views.php';
 
    $site_title = 'BACS 350 - Demo Server';
    $page_title = 'Objects for Data';
    begin_page($site_title, $page_title);


    // Page Content
    echo '<p><a href="..">Solutions</a></p>';
    
    
    // Bring in subscribers logic
    require_once 'subscriber.php';
    

    // Render a list of subscribers
    $subscribers->show_subscribers();


    // Show the add form
    echo '
        <div class="card">
            <h3>Add Subscriber</h3>

            <form action="insert.php" method="post">
                <p><label>Name:</label> &nbsp; <input type="text" name="name"></p>
                <p><label>Email:</label> &nbsp; <input type="text" name="email"></p>
                <p><input type="submit" value="Sign Up"/></p>
            </form>
        </div>
    ';


    end_page();
?>
