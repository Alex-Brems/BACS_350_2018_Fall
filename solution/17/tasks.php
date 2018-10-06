<?php

    // Show the tasks as a bullet list
    function list_tasks_view($tasks) {
        
        echo '<h3>Tasks To Do</h3>';
        if (count($tasks) == 0) :
            echo '<p>No tasks in list</p>';
        else :
            echo '<ul>';
            foreach ($tasks as $task) :
                echo '<li>' . $task . '</li>';
            endforeach;
            echo '</ul>';
        endif;
        
    }


    // Show the form and create data to post
    function add_task_view($tasks) {
        
        echo '
            <h3>Add Task</h3>
            
            <form action="." method="post">
            
                <p><input type="text" name="task"></p>
                <p><input type="submit" value="Add Task"/></p>
                
                <input type="hidden" name="action" value="add">
                ' . task_array($tasks) . '
                
            </form>
        ';
        
    }


    // Create hidden fields to pass the tasks with post data
    function task_array($tasks) {
        foreach ($tasks as $task) {
            echo '<input type="hidden" name="tasklist[]" value="' . htmlspecialchars($task) . '">';
        }
    }


?>