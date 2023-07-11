<?php
session_start();
include 'connection.php';
if(isset($_SESSION['user_id'])){
    $user_id =$_SESSION['user_id'];
    $query = "delete from users where user_id = $user_id";
    $res = mysqli_query($conn,$query);
    if($res){
        echo "success";
    }else{
        echo "ERROR: cannot delete user now ";
    }
}else{
    echo "no session";
}
