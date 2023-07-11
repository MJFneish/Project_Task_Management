<?php
session_start();
include("connection.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_SESSION['user_id']) && isset($_SESSION['current_task'])){
        $task_id = $_SESSION['current_task'];
        if (!empty(trim($_POST["tname"])) && !empty(trim($_POST["deadline_date"])) && !empty(trim($_POST["description"]))) {
            $tname = mysqli_escape_string($conn,trim($_POST["tname"]));
            $deadline_date = trim($_POST["deadline_date"]);
            $description = mysqli_escape_string($conn,trim($_POST["description"]));
            $query = "update tasks 
                      set tname = '$tname', deadline_date = '$deadline_date', description = '$description'
                      where task_id = $task_id " ;
            $res = mysqli_query($conn, $query);
            if($res){
                echo "success";
            }else{
                echo "Error occurred during update task";
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