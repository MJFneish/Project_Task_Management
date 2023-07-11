<?php
session_start();
include("connection.php");
include("functions.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        if (!empty(trim($_POST["pname"])) && !empty(trim($_POST["client"])) && !empty(trim($_POST["deadline_date"])) && !empty(trim($_POST["description"]))) {
            $pname = mysqli_escape_string($conn, trim($_POST["pname"]));
            $client = mysqli_escape_string($conn, trim($_POST["client"]));
            $deadline_date = trim($_POST["deadline_date"]);
            $description = mysqli_escape_string($conn, trim($_POST["description"]));
            $project_id = rand_num(12);

            $query = "insert into projects (project_id, pname ,  client , deadline_date , description, user_id) values ($project_id, '$pname', '$client', '$deadline_date', '$description', $user_id)";
            $res = mysqli_query($conn, $query);
            if($res){
                $_SESSION['current_project'] = $project_id;
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