<?php
include 'connection.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $uemail = mysqli_escape_string($conn, trim($_POST['uemail']));
    $zero = 0;

    $res = mysqli_query($conn, "select * from users where uemail = '$uemail'");
    if($res && mysqli_num_rows($res) > 0 ){
        $user_data = mysqli_fetch_assoc($res);
        $res = mysqli_query($conn, "update users set reset_password = $zero where uemail = '$uemail'");
        echo "success";
    }else{
        echo "you has parsed a wrong email:".$uemail;
    }
}
else
    echo "Something went wrong :/";
