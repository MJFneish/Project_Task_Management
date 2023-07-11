<?php
    session_start();
    include("actions/connection.php");
    include("actions/functions.php");
    
    $user_data = check_login();
    $mode = check_mode();
    $sidebar_link = "profile";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ==========CSS========== -->
    <link rel="stylesheet" href="assets/css/sideBar.css">
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/css/scrollbar.css">
    <link rel="stylesheet" href="assets/css/mode.css">
    <link rel="stylesheet" href="assets/css/input_box.css">
    <link rel="stylesheet" href="assets/css/submit.css">
    <link rel="stylesheet" href="assets/css/profile.css">
    <!-- ======================= -->
    
    <!-- ==========Boxicons========== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <!-- ==========Ion-icons========== -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- ============================ -->
    
    <title>Profile</title>
    <link rel="icon" href="assets/images/favicon.ico">
    
</head>
<body class="<?php echo $mode ?>">
    
    <?php include 'pages-content/sidebar.php';?>

    <section class="home">
        <?php include('pages-content/profile.php')?>
    </section>

    <!-- ==========JS========== -->
    <script src="assets/js/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="assets/js/sideBar.js"></script>
    <script src="assets/js/mode.js"></script>
    <script src="assets/js/profile.js"></script>
    <script src="assets/js/actions/toggleAppTheme.js"></script>
    <script src="assets/js/togglepass.js"></script>
    <!-- ======================= -->
    <script src="https://kit.fontawesome.com/1c43dc508c.js" crossorigin="anonymous"></script>

</body>
</html>