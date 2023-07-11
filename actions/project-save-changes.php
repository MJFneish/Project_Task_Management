<?php
session_start();
include("connection.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_SESSION['user_id']) && isset($_SESSION['current_project'])){
        $user_id = $_SESSION['user_id'];
        $project_id = $_SESSION['current_project'];
        if (!empty(trim($_POST["pname"])) && !empty(trim($_POST["client"])) && !empty(trim($_POST["deadline_date"])) && !empty(trim($_POST["description"]))) {
            $pname = mysqli_escape_string($conn, trim($_POST["pname"]));
            $client = mysqli_escape_string($conn, trim($_POST["client"]));
            $deadline_date = trim($_POST["deadline_date"]);
            $description = mysqli_escape_string($conn, trim($_POST["description"]));
            $query = "update projects 
                      set pname = '$pname',  client = '$client', deadline_date = '$deadline_date', description = '$description'
                      where project_id = $project_id and user_id = $user_id" ;
            $res = mysqli_query($conn, $query);
            if($res){
                echo "success";
            }else{
                echo "Error occurred during update project";
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