<?php

    // Start the page
    require_once '../views.php';

    $page_title = 'Include Design Pattern';
    begin_page($page_title);
?>

<h1></h1>
<p><a href="..">Solutions</a></p>
<p><a href=".">Includes</a></p>

<p>
    The Include Design Pattern allows you to write code once and use it many times.
</p>


<h2>Problem</h2>

<p>
    Many constructs are repeated on different pages of a website. We need an easy way to use code that we have written
    for several different pages. HTML provides no mechanism that will allow us to reuse HTML code.
</p>
<p>
    One place where this would be handy is in defining a standard HTML structure for every web page in our
    site. All of the code required to start a page and the code to end a page could be packaged in a way
    that we would not have to replicate this code.
</p>



<h2>Solution</h2>

<h3>Header/Footer Alternative</h3>
<p>
    Put all of the HTML code that we want to use into two files. <b>header.php</b> holds the start of the page while <b>footer.php</b> holds the end of the page.
</p>

<p>
    Define a page with the following PHP code.
</p>
<pre>
        include 'header.php';
        < !-- Add HTML code here -- >
        include 'footer.php';
</pre>

<h3>Page Template Alternative</h3>
<p>
    Define a standard header and footer that should be on every HTML page. Then build this into two functions
    that can be invoked to import the header and footer code.
</p>
<p>
    Define a page with the following PHP code.
</p>
<pre>
        require_once 'views.php';
        $page_title = 'Page Title';
        begin_page($page_title);
        < !-- Add HTML code here -- >
        end_page();
</pre>

<?php
   // End the page
    end_page();
?>
