<?php
session_start();
include("connection.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_SESSION['user_id']) && isset($_SESSION['current_project']) && isset($_POST['complete']) ){
        $user_id = $_SESSION['user_id'];
        $project_id = $_SESSION['current_project'];
        if($_POST['complete'] === "completed")
            $query = "CALL mark_project_tasks_completed($project_id)";
        else
            $query = "CALL mark_project_tasks_uncompleted($project_id)";
        $res = mysqli_query($conn, $query);
        if($res){
            echo "success";
        }else{
            echo "Error occurred during update project ";
        }
    }else{
        echo "Access denied!";
    }
}else{
    echo "Error: request method not supported";
}