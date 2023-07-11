<?php
include("actions/functions.php");
    
$mode = check_mode();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/forget.css">
    <link rel="stylesheet" href="./assets/css/mode.css">
    <link rel="stylesheet" href="./assets/css/root.css">
    <link rel="stylesheet" href="./assets/css/input_box.css">
    <link rel="stylesheet" href="./assets/css/submit.css">

    
    <title>Forget password</title>
    <link rel="icon" href="assets/images/favicon.ico">

</head>
<body class="<?php echo $mode ?>">
    <div class="container">
        <div class="forget_box active">
            <div class="title">
                <div class="head">
                    <a href="login.php">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <h2>Forgotten your Password?</h2>
                </div>
                <div class="error-text">Enter Your Email</div>
            </div>
            <form method="post" class="forget">
                <div class="input_box">
                    <input type="text" name="uemail">
                    <span>Email</span>
                </div>
                <div class="link">
                    <button type="submit" class="submit forgetSubmit">
                        <span>Verify Your Email</span>
                        <i></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="confirm_box">
            <div class="title">
                <h2>Enter Your Verification Code</h2>
                <div class="error-text-confirm">We just sent you a password to the entered email</div>
            </div>
            <form method="post" class="confirm">
                <div class="input_box">
                    <input type="text" name="vercode">
                    <span>Code</span>
                </div>
                <div class="input_box passwordInput">
                    <input type="password" name="cpass1" class="pswrd" value="">
                    <i class="togglebtn"></i>
                    <span>Password</span>   
                </div>
                <div class="input_box passwordInput">
                    <input type="password" name="cpass2" class="pswrd" value="">
                    <i class="togglebtn"></i>
                    <span>ConfirmPassword</span>
                </div>
                <div class="link">
                    <button type="submit" class="submit confirmSubmit">
                        <span>Submit</span>
                        <i></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/js/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="./assets/js/togglepass.js"></script>
    <script src="./assets/js/actions/forget.js"></script>
    <!--============= FontAwesome =============-->
    <script src="https://kit.fontawesome.com/1c43dc508c.js" crossorigin="anonymous"></script>
    <!--============= End FontAwesome =============-->

</body>
</html>