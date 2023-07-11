<?php
    include("connection.php");
    include("functions.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $uemail = mysqli_escape_string($conn, trim($_POST['uemail']));
        $vercode = mysqli_escape_string($conn, trim($_POST['vercode']));
        $cpass1 = mysqli_escape_string($conn, trim($_POST['cpass1']));
        $cpass2 = mysqli_escape_string($conn, trim($_POST['cpass2']));
        $zero = 0;

        $sql = mysqli_query($conn, "select * from users where uemail = '$uemail'");
        if($sql && mysqli_num_rows($sql) > 0 && $cpass1 != "" && $cpass2 != "" ){
            $user_data = mysqli_fetch_assoc($sql);
            if($user_data['reset_password'] == $vercode){
                if($cpass1 == $cpass2 ){
                    $sql = mysqli_query($conn, "update users set reset_password = $zero, upass = '$cpass1' where uemail = '$uemail'");
                    if($sql) {
                        echo "success";
                    } else {
                        echo "Could not update password\n". mysqli_error($conn);
                    }
                }else{
                    echo "please confirm your password correctly!\nSomething went wrong";
                }
            }else{
                echo "incorrect verification code!";
            }
        }else{
            echo "Please enter valid input!";
        }
    }
    else
        echo "Something went wrong :/";
    

?>