<?php
    session_start();
    include("connection.php");
    include("functions.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //something was posted
        $uname = mysqli_escape_string($conn, trim($_POST['uname']));
        $uemail = mysqli_escape_string($conn, trim($_POST['uemail']));
        $upass = mysqli_escape_string($conn, trim($_POST['upass']));
    }
    if(!empty($uname) && !empty($uemail) && !empty($upass) && !is_numeric($uname))
    {
        if(filter_var($uemail, FILTER_VALIDATE_EMAIL)){
            //checking for unique user
            $sql = mysqli_query($conn, "select * from users where uemail = '$uemail'");
            if($sql && mysqli_num_rows($sql) > 0){ // if email already exists
                echo "it seems that this email exists already, please login instead";
                die;
            }
            //save to database
            else{
                $user_id = rand_num(12);
                $query = "insert into users (user_id, uname, uemail, upass) values ('$user_id','$uname','$uemail','$upass')";        
                $result = mysqli_query($conn, $query);
                if($result)
                {
                    if(isset($_SESSION['user_id']) && $_SESSION['user_id'] !== $user_id){
                        unset($_SESSION['user_id']);
                        if(isset($_SESSION['current_project']))
                            unset($_SESSION['current_project']);
                        if(isset($_SESSION['current_task']))
                            unset($_SESSION['current_task']);
                    }
                    $_SESSION['user_id'] = $user_id;
                    echo "success";
                }else{
                    echo "Something went wrong during insertion into database!\n";
                    die;
                }
            }
        }else{
            echo "$uemail - invalid";
            die;
        }
    }else{
        echo "Please fill all fields!";
        if(is_numeric($uname))
            echo " and your name must include alphabetical characters";
        die;
    }
?>