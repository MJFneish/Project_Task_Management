<?php
session_start();
include("connection.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_SESSION['user_id']) && isset($_SESSION['current_task']) && isset($_POST['delete']) && $_POST['delete'] === 'true' ){
        $task_id = $_SESSION['current_task'];
        $query = "delete from tasks where task_id = $task_id";
        $res = mysqli_query($conn, $query);
        if($res){
            unset($_SESSION['current_task']);
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