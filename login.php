<?php
include("actions/functions.php");
$mode = check_mode();
$active_login_signup = check_active_login_signup();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/css/login_signup.css">
    <link rel="stylesheet" href="assets/css/input_box.css">
    <link rel="stylesheet" href="assets/css/mode.css">
    <link rel="stylesheet" href="assets/css/submit.css">
    <link rel="stylesheet" href="assets/css/scrollbar.css">

    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    
    <title>Authentication</title>
    <link rel="icon" href="assets/images/favicon.ico">

</head>
<body class="<?php echo $mode ?>">
    <div class="login_signup_box">
        <div class="swapbox">   
            <h2 id="LOGIN">Login</h2>
            <h2 id="SIGNUP">SignUp</h2>
            <i id="SWAP" class="<?php if($active_login_signup === 'signup') echo 'toright'?>"></i>
        </div>
        <div class="error-text">!</div>
        <div class="login_signup">
            <form method="post" class="login <?php if($active_login_signup === 'login') echo 'active'?>" autocomplete="off">
                <div class="input_box">
                    <input type="text" name="uemail" value="" >
                    <span>Email</span>
                </div>
                <div class="input_box passwordInput">
                    <input type="password" name="upass"  class="pswrd" value="" >
                    <i class="togglebtn"></i>
                    <span>Password</span>
                </div>
                <div class="link">
                
                    <button type="submit" value="Login" class="submit loginSubmit">
                            <span>Login</span>
                            <i></i>
                    </button>
                
                    <a href="./forget.php">Forget Password?<i></i></a>
                </div>
            </form>
            <form method="post" class="signup <?php if($active_login_signup === 'signup') echo 'active';?>" autocomplete="off">
                <div class="input_box">
                    <input type="text" name="uname" value="">
                    <span>Username</span>
                </div>
                <div class="input_box">
                    <input type="text" name="uemail" value="">
                    <span>Email</span>
                </div>
                <div class="input_box passwordInput">
                    <input type="password" name="upass" class="pswrd" value="">
                    <i class="togglebtn"></i>
                    <span>Password</span>   
                </div>
                <div class="link">
                    <button type="submit" value="" class="submit signupSubmit">
                        <span>Signup</span>
                        <i></i>
                    </button>
                </div>
            </form>
            
        </div>
        
        <div class="mode wrap-right-bottom">
            <div class="moon-sun">
                <i class='bx bx-moon icon moon' ></i>
                <i class='bx bx-sun icon sun' ></i>
            </div>
            <span class="mode-text text">Dark Mode</span>

            <div class="toggle-switch">
                <span class="switch"></span>
            </div>
        </div>
    </div>
    
    
    <!--============= BuildCore =============-->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/togglepass.js"></script>
    <!--============= End BuildCore =============-->
    
    <!--============= Ajax =============-->
    <script src="assets/js/actions/signup.js"></script>
    <script src="assets/js/actions/login.js"></script>
    <script src="assets/js/actions/toggleAppTheme.js"></script>
    <script src="assets/js/actions/toggleActiveLoginSignUp.js"></script>
    <!--============= EndAjax =============-->
    
    <!--============= FontAwesome =============-->
    <script src="https://kit.fontawesome.com/1c43dc508c.js" crossorigin="anonymous"></script>
    <!--============= End FontAwesome =============-->
    
</body>
</html>