<?php
session_start();
include 'connection.php';

$project_id= $_SESSION['current_project'];
$query = "select * from projects where project_id = $project_id";
$res = mysqli_query($conn, $query);
if($res  && mysqli_num_rows($res) > 0){
    $project_data = mysqli_fetch_assoc($res);
    $project_data['response'] = 'success';
    echo json_encode($project_data);
}else{
    $project_data['response'] = 'error';
    echo json_encode($project_data);
}