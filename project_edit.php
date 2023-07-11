<?php
session_start();
include("actions/connection.php");
include("actions/functions.php");

$user_data = check_login();
$mode = check_mode();

$project_data = false;

if(isset($_SESSION['current_project']) && isset($_SESSION['user_id'])){
    $project_data = check_project($_SESSION['current_project'], $_SESSION['user_id'] );
}else{
    echo "<script>
            alert('you have no current project selected, please select a project from home page first');
            location.href='index.php'
         </script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ==========CSS========== -->
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/css/input_box.css">
    <link rel="stylesheet" href="assets/css/submit.css">
    <link rel="stylesheet" href="assets/css/scrollbar.css">
    <link rel="stylesheet" href="assets/css/project_edit.css">
    <!-- ===========End CSS============ -->



    <!-- ==========icons========== -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/1c43dc508c.js" crossorigin="anonymous"></script>
    <title>Project Edit</title>
    <link rel="icon" href="assets/images/favicon.ico">

</head>
<body class="<?php echo $mode ?>">

<section class="home">
    <?php include('pages-content/project_edit.php');?>
</section>

<!-- ==========JS========== -->
<script src="assets/js/jquery.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="module" src="assets/js/project_edit.js"></script>
<!-- ======================= -->

</body>
</html>