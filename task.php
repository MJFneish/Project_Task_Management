<?php
session_start();
include("actions/connection.php");
include("actions/functions.php");

$user_data = check_login();
$mode = check_mode();
$sidebar_link = "task";

$task_data = false;
if(!isset($_SESSION['current_project'])){
    echo "<script>
            alert('you have no current task nor project selected, please select a project from home page first');
            location.href='index.php';
        </script>";
}
if(isset($_GET['task'])){
    $task_data = check_task($_GET['task'], $_SESSION['current_project'], $_SESSION['user_id'] );
    if($task_data!==false) {
        $_SESSION['current_task'] = $task_data['task_id'];

    } else {
        echo "<script>
                alert('Error with the url');
             </script>";
        if(isset($_SESSION['current_project'])){
            echo "<script>
                    location.href='project.php';
                </script>";
        }else{
            echo "<script>
                    location.href='index.php';
                </script>";
        }
    }
}else if (isset($_SESSION['current_task'])) {
    $task_data = check_task($_SESSION['current_task'], $_SESSION['current_project'], $_SESSION['user_id']);
} else {
    echo "<script>
        alert('you have no current task nor project selected, please select a project from home page first');
        location.href='project.php';
    </script>";
}
if(empty($task_data)){
    echo "<script>
            alert('you have no current task nor project selected, please select a project from home page first');
            location.href='project.php';
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
    <link rel="stylesheet" href="assets/css/sideBar.css">
    <link rel="stylesheet" href="assets/css/mode.css">
    <link rel="stylesheet" href="assets/css/submit.css">
    <link rel="stylesheet" href="assets/css/scrollbar.css">
    <link rel="stylesheet" href="assets/css/task.css">
    <link rel="stylesheet" href="assets/css/input_box.css">

    <!-- ===========End CSS============ -->



    <!-- ==========Ion-icons========== -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- ============================ -->
    <!-- ==========Boxicons========== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <!-- ============================ -->
    <title>Task</title>
    <link rel="icon" href="assets/images/favicon.ico">

</head>
<body class="<?php echo $mode ?>">

<?php include 'pages-content/sidebar.php';?>

<section class="home">
    <?php include('pages-content/task.php');?>
</section>

<!-- ==========JS========== -->
<script src="assets/js/jquery.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" ></script>
<script src="assets/js/sideBar.js"></script>
<script src="assets/js/mode.js"></script>
<script type="module" src="assets/js/countDown.js"></script>
<script type="module" src="assets/js/task.js"></script>
<script src="assets/js/actions/toggleAppTheme.js"></script>
<!-- ======================= -->

</body>
</html>