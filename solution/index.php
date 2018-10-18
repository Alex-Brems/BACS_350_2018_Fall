<?php 

    // Start the page
    require_once '../views.php';

    $site_title = 'BACS 350 - Demo Server';
    $page_title = 'BACS 350 - Solutions';
    begin_page($site_title, $page_title);


    echo '
        <h1>BACS 350 - Solutions</h1>

        <p>All of the solutions to the projects in BACS 350 teach important skills.</p>

        <p>This page also includes a stylesheet.</p>

        <h2>Solutions and Skills</h2>

        <p>Demonstrations for how to solve common problems</p>
        <p>
            <a href="https://seamansguide.com/guide/PhpApps/docs/Patterns.md">Design Patterns Tutorials</a>
            are found on our class website.
        </p>
        <ul>
            <li>
                <a href="01">1. Hosting</a> - Setup web hosting
            </li>
            <li>
                <a href="02">2. Include</a> - Reuse HTML and PHP code on multiple pages.
            </li>
            <li>
                <a href="03">3. Page Template</a> - Define a standard page layout.
            </li>
            <li>
                <a href="05">4. Forms</a> - Handle forms input.
            </li>
            <li>
                <a href="04">5. Databases</a> - Create a new database
            </li>
            <li>
                <a href="06">6. Database Connection</a> - Connect to a database
            </li>
            <li>
                <a href="07">7. List Records</a> - Create an HTML list of database records
            </li>
            <li>
                <a href="08">8. Add Records</a> - Add new records to a database
            </li>
            <li>
                <a href="09">9. Data CRUD Functions</a> - Apply the MVC pattern. 
            </li>
            <li>
                <a href="10">10. Data Views Functions</a> - Apply the MVC pattern. 
            </li>
            <li>
                <a href="11">11. Logging</a> - Page logging
            </li>
            <li>
                <a href="12">12. Apache Setup</a> - Configure Apache for local development
            </li>
            <li>
                <a href="13">13. App Planning</a> - Work a project with Milestones
            </li>
            <li>
                <a href="14">14. MVC Pattern</a> - Combining Page, DB, CRUD, View, Controller Patterns
            </li>
            <li>
                <a href="15">15. Local and Remote</a> - Create apps locally and redeploy them remotely. Page redirect.
            </li>
            <li>
                <a href="16">16. File Viewer</a> - Directory listing and code viewer.
            </li>
            <li>
                <a href="17">17. Dynamic List</a> - Associative arrays in memory.
            </li>
            <li>
                <a href="18/">18. App Milestones</a> - Steps to build an app.
            </li>
            <li>
                <a href="19">19. Objects </a> - Use objects to define app data types.
            </li>
             <li>
                <a href="20">20. Regular Expressions </a> - String replacement
            </li> 
            <li>
                <a href="22">22. Controller </a> - Post results to same page
            </li>
            <li>
                <a href="23">23. HTML Templates </a> - Reading HTML from files
            </li>
            <li>
                <a href="24">24. Page Templates </a> - Building a page from template
            </li>
            <li>
                <a href="25">25. View Templates </a> - Building a page from multiple views
            </li>
        </ul>
    ';


    end_page(); 

?>
