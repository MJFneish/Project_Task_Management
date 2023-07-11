<?php
session_start();
include("connection.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_SESSION['user_id']) && isset($_SESSION['current_task']) && isset($_POST['complete']) ){
        $task_id = $_SESSION['current_task'];
        if($_POST['complete'] === "completed")
            $query = "update tasks set completed = 1 where task_id = $task_id";
        else
            $query = "update tasks set completed = 0 where task_id = $task_id";

        $res = mysqli_query($conn, $query);
        if($res){
            echo "success";
        }else{
            echo "Error occurred during update project ";
        }
    }else{
        echo "Access denied!" ;
    }
}else{
    echo "Error: request method not supported";
}