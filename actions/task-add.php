<?php
session_start();

include("connection.php");
include("functions.php");


if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_SESSION['user_id']) && isset($_SESSION['current_project'])){
        $project_id = $_SESSION['current_project'];
        if (!empty(trim($_POST["tname"])) && !empty(trim($_POST["deadline_date"])) && !empty(trim($_POST["description"]))) {
            $tname = mysqli_escape_string($conn, trim($_POST["tname"]));
            $deadline_date = trim($_POST["deadline_date"]);
            $description = mysqli_escape_string($conn, trim($_POST["description"]));
            $task_id = rand_num(12);

            $query = "insert into tasks (task_id , tname ,deadline_date , description, project_id) 
            values ($task_id, '$tname', '$deadline_date', '$description', $project_id)";
            $res = mysqli_query($conn, $query);
            if($res){
                $_SESSION['current_task'] = $task_id;
                echo "success";
            }else{
                echo "Error occurred during insertion of the task!";
            }
        }else{
            echo "Please fill all fields!";
        }
    }else{
        echo "Access denied!";
    }
}else{
    echo "Error: request method not supported";
}