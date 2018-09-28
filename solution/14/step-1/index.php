<?php

    // Start the page
    require_once '../views.php';

    $page_title = 'MVC Pattern - Step 1';
    begin_page($page_title);


    // Page Content
    echo '
        <p><a href="..">MVC Pattern</a></p>
        <h2>Step 1 - Page Style and Structure</h2>

        <h3>Page Pattern</h3>
        <p>
            The MVC Pattern is a design pattern that makes your code easier to read by adding consistency.
            This solution is built in a series of steps so that you can see the progression toward the
            final answer.   Repeat these same steps in building your code.
        </p>
        <p>
            This steps gathers the general page structure into a single HTML file called views.php.
            This file contains two functions "begin_page($title)" and "end_page()".
            These functions take the place of the old "header.php" and "footer.php".
        </p>
        <pre>
            Usage:
                require_once \'view.php\';
                begin_page("My Page");
                --- content for page ---
                end_page();
        </pre>

        <h3>Source Code</h3>
        <p>Study the source code in "solution/14/step-1" to understand how to define usable page structure.</p>
        <p>Make sure that you have pulled fresh changes from <b>Mark-Seaman/BACS_350_2018_Fall</b> repo.</p>

    ';


    // Show links for page testing
//    require 'test.php';


    // End the page
    end_page();
?>