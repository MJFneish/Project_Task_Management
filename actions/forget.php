<?php
    include("connection.php");
    include("functions.php");

    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;

    require '../phpmailer/src/Exception.php';
    require '../phpmailer/src/PHPMailer.php';
    require '../phpmailer/src/SMTP.php';

    //if something was posted
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $uemail = mysqli_escape_string($conn, trim($_POST['uemail']));
        if(!empty($uemail))
        {
            if(filter_var($uemail, FILTER_VALIDATE_EMAIL)){ //IF EMAIL IS VALID
                $sql = mysqli_query($conn, "select * from users where uemail = '$uemail'");
                if($sql && mysqli_num_rows($sql) > 0){ // if email already exists
                    $password = generatePassword(12);
                    $message = "your generated password is ". "$password";
                    $subject = 'Verification Code';
                    $myemail = 'fneishm123@gmail.com';
    
                    $mail = new PHPMailer(true);
                    try{
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'fneishm123@gmail.com';
                        $mail->Password = 'ruwdlzanxvxcjucz';
                        $mail->SMTPSecure = 'ssl';
                        $mail->Port = 465;
                        
                        $mail->setFrom($myemail);
                        $mail->addAddress($uemail);
                        $mail->isHTML(true);
                        $mail->Subject = $subject;
                        $mail->Body = $message;
        
                        $mail->send();
                        $sql = mysqli_query($conn, "update users set reset_password = '$password' where uemail = '$uemail'");
                        if($sql) {
                            echo "success";
                        } else {
                            echo "We are not able to send your reset password. Please try again later.";
                        }
                    }catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    
                    
                }else{
                    echo "No such email founded";
                }
            }else{
                echo "$uemail - is not valid email";
            }
        }else{
            echo "Please enter valid input";
        }
    }
    else
        echo "Something went wrong";
    
?>