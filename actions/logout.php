<?php
//we need to design index.html or any other file that belong to this project using a button to logout and then we direct onclick of that button to this page
session_start();
    if(isset($_SESSION['user_id']))
        unset($_SESSION['user_id']);
    if(isset($_SESSION['current_project']))
        unset($_SESSION['current_project']);
    if(isset($_SESSION['current_task']))
        unset($_SESSION['current_task']);

    header('Location: ../login.php');
    die;
?>