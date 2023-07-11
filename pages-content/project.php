<?php
$pathToJSONFile = 'assets/json/current_project_tasks.json';

if(!file_exists($pathToJSONFile)){
    touch($pathToJSONFile);
}
$tasks_data = array();
if(is_array($project_data)) {
    $tasks_data = get_current_project_tasks($pathToJSONFile, $project_data['project_id']);//array of tasks, each task is an array
}
?>

<div class="project_box">
    <div class="title">
        <div class="head">
            <h2> <span style="color:#695CFE">Project:</span> <?php echo $project_data['pname']?></h2>
            <div class='error-text'></div>
            <h2>Count Down:</h2>
            <div id="countdown">
                <div class="flex-row flex-wrap">
                    <p id="days" style="--clr:#695CFE;">00 days</p>
                    <p id="hours" style="--clr:#04fc43;">00 hours</p>
                </div>
                <div class="flex-row flex-wrap">
                    <p id="minutes" style="--clr:#fee800;">00 minutes</p>
                    <p id="seconds" style="--clr:#ff2972;">00 seconds</p>
                </div>
            </div>
        </div>
    </div>
    <div class="box" style="--clr:#695CFE">
        <div class="flex-row">
            <div class="icon"><ion-icon name="person-outline"></ion-icon></div>
            <div class="label" >
                <h3>Project's Client:</h3>
                <p><?php echo $project_data['client'] ?></p>
            </div>
        </div>
    </div>
    <div class="box" style="--clr:#009325">
        <div class="flex-row">
            <div class="icon"><ion-icon name="document-text-outline"></ion-icon></div>
            <div class="label" >
                <h3>Description:</h3>
                <p class="description" ><?php echo $project_data['description']?></p>
            </div>
        </div>
    </div>
        <div class="box" style="--clr:#a19400">
            <div class="flex-row">
                <div class="icon"><ion-icon name="list-outline"></ion-icon></div>
                <div class="label" >
                    <h3>Number of Tasks:</h3>
                    <p>
                        <?php $nbr_tasks =$project_data['nbr_tasks'];
                            if($nbr_tasks>0){
                                echo $nbr_tasks;
                            }else{
                                echo "no task had been created";
                            }
                        ?></p>
                </div>
        </div>
    </div>
    <div class="box" style="--clr:#ff2972">
        <div class="flex-row">
            <div class="icon"><ion-icon name="checkmark-done-outline"></ion-icon></div>
            <div class="label" >
                <h3>Tasks Completed:</h3>
            </div>
            <div id='supportTracker'></div>
        </div>
    </div>
    <div class="box" style="--clr:#0ed095">
        <div class="flex-row">
            <div class="icon"><ion-icon name="alert-circle-outline"></ion-icon></div>
            <div class="label" >
                <h3>Status: </h3>
                <p><?php echo $project_data['completed'] ?></p>
            </div>
        </div>
    </div>
    <div class="manageProject">
        <div class="link" style="--text-color:#ff2972">
            <button type="submit" id="delete" value="" class="submit">
                <span>DELETE</span>
                <i></i>
            </button>
        </div>
        <div class="link" style="--text-color:#0ed095">
            <button type="submit" id="edit" value="" class="submit">
                <span>EDIT</span>
                <i></i>
            </button>
        </div>
        <div class="link" style="--text-color:#a19400">
            <button onclick="window.location.href = 'task_add.php';" type="submit" id="addTask" value="" class="submit">
                <span>Add Task</span>
                <i></i>
            </button>
        </div>
    </div>
    <div class="title">
        <div class="head">
            <h2> <span style="color:#695CFE">Tasks:</h2>
        </div>
    </div>
    <div class='task-container'>
    <?php
    $i=0;
    $colors = ["#695CFE", "#ff2972", "#0ed095", "#a19400", "#009325"];
    if(!empty($tasks_data)){
        foreach ($tasks_data as $task) {
            echo "
                    <a href='task.php?task=" . $task['task_id'] . "' class='task-box' style='--clr:" . $colors[($i++ % count($colors))] . "'>
                        <p class='task-title'><span> Task: </span>" . $task['tname'] . "</span></p>
                        <p class='description'><span> Description: </span>" . $task['description'] . "</p>
                        <p class='status'><span> Status: </span>" . ($task['completed'] ==='1'? 'completed': 'not completed') . "</p>
                        <p class='start_date'><span> start date: </span>" . explode(' ', $task['start_date'])[0] . "</p>
                        <p class='end_date'><span> end date: </span>" . $task['deadline_date'] . "</p>
                    </a>
               ";
        }
    }else{
        echo "no task in this project";
    }

    ?>
    </div>
</div>
