<?php
session_start();
include 'connection.php';

$user_id= $_SESSION['user_id'];
$project_id= $_SESSION['current_project'];
$task_id= $_SESSION['current_task'];
$query = "select t.tname, t.description, t.start_date, t.deadline_date, t.completed, t.project_id 
            from tasks t, projects p 
            where p.project_id = t.project_id and p.project_id=$project_id and t.task_id =$task_id AND p.user_id = $user_id";
$res = mysqli_query($conn, $query);
if($res  && mysqli_num_rows($res) > 0){
    $task_data = mysqli_fetch_assoc($res);
    $task_data['response'] = 'success';
    echo json_encode($task_data);
}else{
    $task_data['response'] = 'ERROR: '.mysqli_error($conn);
    echo json_encode($task_data);
}