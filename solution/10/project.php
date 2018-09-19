<?php

    // Setup a page title variable
    $page_title = "BACS 350 - Project #10";

    // Include the page start
    include 'header.php';

    // Include the main page content
    echo '<h1>Subscriber List Project Plan</h1>

        <p>Project Planning</p>
        <h3 id="application-project">Application Project</h3>
        <ul>
            <li>Always starts with a business need</li>
            <li>Keep is simple</li>
            <li>Focus to succeed</li>
        </ul>
        <h3 id="project-plan">Project Plan</h3>
        <ul>
            <li>Prime Directive</li>
            <li>Requirements</li>
            <li>User Experience</li>
            <li>Technology</li>
            <li>Milestones</li>
        </ul>
        <h3 id="prime-directive">Prime Directive</h3>
        <ul>
            <li>Create a subscriber list</li>
            <li>Users can register themselves</li>
        </ul>
        <h3 id="requirements">Requirements</h3>
        <ul>
            <li>Pages - subscribers, register, thank you</li>
            <li>Show registered subscribers</li>
            <li>Registration adds to list</li>
            <li>New users get confirmation</li>
        </ul>
        <h3 id="user-experience">User Experience</h3>
        <ul>
            <li>Register View (name, email)</li>
            <li>Confirmation View (thank you for signing up)</li>
            <li>Subscribers View (show registered users)</li>
        </ul>
        <h3 id="technology">Technology</h3>
        <ul>
            <li>Build a stand-alone PHP app</li>
            <li>subscribers directory
                <ul>
                    <li>subscribers.php</li>
                    <li>register.php</li>
                    <li>thank_you.php</li>
                </ul>
            </li>
            <li>Modular/well-factored design</li>
            <li>Standard design patterns</li>
            <li>Standard visual appearance</li>
            <li>Good version control practices</li>
        </ul>
        <h3 id="milestones">Milestones</h3>
        <ul>
            <li>Pages Created</li>
            <li>Show Registered Users</li>
            <li>Add New User</li>
            <li>Integrate with Home Page</li>
        </ul>


        <h3 id="build-the-subscribers-app">Build the Subscribers App</h3>
        <ul>
            <li>Use the information given in Project Plan</li>
            <li>Build the required app in four Milestones</li>
            <li>Pull changes from &quot;git@github.com:Mark-Seaman/BACS_350_2018_Fall.git&quot;</li>
        </ul>
        <h3 id="work-in-pairs-from-monday">Work in Pairs from Monday</h3>
        <ul>
            <li>Two brains one keyboard</li>
            <li>Alternate roles for each Milestone</li>
        </ul>
        <h3 id="after-each-milestone">After each Milestone</h3>
        <ul>
            <li>Fix all bugs</li>
            <li>Test all features</li>
            <li>Commit to version control</li>
            <li>Plan next Milestone</li>
        </ul>
        <h3 id="files-when-complete">Files when Complete</h3>
        <pre><code>

* /
* * index.php
* * header.php
* * footer.php
* * Bear_logo.png
* * style.css

* subscribers/
* * index.php
* * subscriber.php
* * db.php
* * select.php
* * insert.php

* project/10/
* * index.php
* * test.php
* * project.php

        </code></pre>
        <h3 id="submit-url-to-canvas">Submit URL to Canvas</h3>
        <ul>
            <li>your-domain/subscribers.php</li>
            <li>Work does not need to be perfect (only almost perfect)</li>
        </ul>

    ';



    // Include the page end
    include 'footer.php';

?>
