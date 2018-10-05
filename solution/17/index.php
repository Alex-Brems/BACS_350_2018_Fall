<?php

    include '../../views.php';

    $site_title = 'BACS 350 - Demo Server';
    $page_title = 'Dynamic List Design Pattern';
    begin_page($site_title, $page_title);


    // Your content goes here

    // Bring in task functions
    require('tasks.php');

    // Create a starter list
    $tasks  = filter_input(INPUT_POST, 'tasklist', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    $task   = filter_input(INPUT_POST, 'task');
    $action = filter_input(INPUT_POST, 'action');
        

    // Initialize the list with two items
    if ($tasks === NULL) {
        $tasks = array();
    }


    // Add item if needed
    switch($action) {
        case 'add': 
            if (!empty($task)) {
                $tasks[] = $task;
            }
            break;
    }

    echo '<h2>Dynamic List Demo</h2>';
     

    // Show the task list
    list_tasks_view($tasks);

   
    // Show add form
    add_task_view($tasks);

  
    echo ' 
        <h2>Learn more</h2>
        <ul>
            <li><a href="..">Other Demos</a></li>
            <li><a href="https://seamansguide.com/guide/PhpApps/docs/Forms.md">Forms Design Pattern</a></li> 
        </ul>
    ';


    end_page();

?>
