<?php 
session_start();
include("connection.php");
$uname = $uemail  = $upassword = "";
$uimage = "assets/images/profile/";
$user_id = $_SESSION['user_id'];
$uname_err = $uemail_err = $uimage_err = $upassword_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate 
    if (!empty(trim($_POST["uname"])) && empty($uimage_err)) {
        $uname = mysqli_escape_string($conn, trim($_POST["uname"]));

        if (!empty(trim($_POST["uemail"]))) {
            if (filter_var($_POST["uemail"], FILTER_VALIDATE_EMAIL)){
                $uemail = mysqli_escape_string($conn, trim($_POST["uemail"]));
                if (!empty(trim($_POST["upassword"]))) {
                    $upassword = mysqli_escape_string($conn, trim($_POST["upassword"]));
                } else {
                    $upassword_err = "Please enter a password.";
                }
            }else{
                $uemail_err = "Invalid email format.";
            }
        } else {
            $uemail_err = "Please enter an email address.";
        }
    } else {
        $uname_err = "Please enter a username.";
    }
    $upload_image =0;
    //file will be checked privately since user might change photo or not
    if (!empty($_FILES["uimage"]) && $_FILES["uimage"]["name"] !== '' ) {
        if($_FILES['uimage']['error'] == 1){
            $uimage_err = "Uploaded file is highly resoluted to be an profiled image. please select a less resoluted image";
        }else{
			$image_info = getimagesize($_FILES["uimage"]["tmp_name"]);
			if ($image_info) {
				$uimage = $uimage . time() .'-image-' . $_FILES["uimage"]["name"] ;
				move_uploaded_file($_FILES["uimage"]["tmp_name"], "../" .$uimage);
                $upload_image =1;
			} else {
				$uimage_err = "Uploaded file is not a supported file type to be an profiled image.";
			}
        }
    }

    if (empty($uname_err) && empty($uemail_err) && empty($uimage_err) && empty($upassword_err)) {
        $query ='';
        // check email is valid to change or not
        $res1 = mysqli_query($conn, "select * from users where user_id ='$user_id' "); //get data for the current user
        if($res1 && mysqli_num_rows($res1) >0){
            $row = mysqli_fetch_assoc($res1);
            $current_user_email = $row['uemail'];
            if($uemail != $current_user_email){//check if the email inserted equal to the current user
                $res2 = mysqli_query($conn, "select * from users where uemail = '$uemail'"); 
                if($res2 && mysqli_num_rows($res2) >0){
                    echo "you cannot change to this email since there is a user that already registered through it";
                    die;
                }
            }
        }else{
            echo "something went wrong during checking your email! please retry later";
            die;
        }
        if($upload_image ===1 ) {
            $query = "update users set uname = '$uname', uemail = '$uemail', upass ='$upassword', profile_path = '$uimage' where user_id=$user_id";
        }else{
            $query = "update users set uname = '$uname', uemail = '$uemail', upass ='$upassword' where user_id=$user_id";
        }
        $res = mysqli_query($conn, $query);
        if($res){
            echo "success";
        }else{
            echo "ERROR: Couldn't update your info";
        }
    } else {
        echo $uname_err . "\n" .$uemail_err . "\n" .$upassword_err . "\n" .$uimage_err;
    }
}else{
    echo "post method not supported";
}