<?php
    session_start();
    include("connection.php");
    include("functions.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //something was posted
        $uemail = mysqli_escape_string($conn, trim($_POST['uemail']));
        $upass = mysqli_escape_string($conn, trim($_POST['upass']));
    
        if(!empty($uemail) && !empty($upass))
        {
            if(filter_var($uemail, FILTER_VALIDATE_EMAIL)){
                //read from database
                $query = "select * from users where uemail = '$uemail' and upass = '$upass'";
                $result = mysqli_query($conn, $query);

                if($result && mysqli_num_rows($result)>0 )
                {
                    $user_data = mysqli_fetch_assoc($result);
                    if(isset($_SESSION['user_id'])){
                        unset($_SESSION['user_id']);
                        if(isset($_SESSION['current_project']))
                            unset($_SESSION['current_project']);
                        if(isset($_SESSION['current_task']))
                            unset($_SESSION['current_task']);
                    }
                    
                    $_SESSION['user_id'] = $user_data['user_id'];
                    echo "success";
                }
                else{
                    echo 'incorrect Email or Password';
                }
            }else{
                echo "$uemail - invalid";
            }
        }else{
            echo "Please enter valid information!";
        }
    }
?>