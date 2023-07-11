<?php
    session_start();
    include("actions/connection.php");
    include("actions/functions.php");
    
    $user_data = check_login();
    $mode = check_mode();
    $sidebar_link = "home";
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
    <link rel="stylesheet" href="assets/css/scrollbar.css">
    <link rel="stylesheet" href="assets/css/submit.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <!-- ===========End CSS============ -->

    <!-- ==========DataTables========== -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <!-- ==========End DataTables============= -->
    
    <!-- ==========icons========== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <!-- ============================ -->
    <!-- ==========Ion-icons========== -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- ============================ -->
    <title>Home</title>
    <link rel="icon" href="assets/images/favicon.ico">

</head>
<body class="<?php echo $mode ?>">
    
    <?php include 'pages-content/sidebar.php';?>

    <section class="home">
        <?php include('pages-content/home.php')?>
    </section>

    <!-- ==========JS========== -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/sideBar.js"></script>
    <script src="assets/js/mode.js"></script>
    <script src="assets/js/home.js"></script>
    <script src="assets/js/actions/toggleAppTheme.js"></script>
    <!-- ======================= -->
    <!-- ===========DataTables============ -->
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <!-- ===========End DataTables============ -->
<!--    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>-->


</body>
</html>