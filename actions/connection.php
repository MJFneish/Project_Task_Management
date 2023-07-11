<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "mjf_mhb_taskmanager";

    if(!$conn = mysqli_connect($dbhost,$dbuser, $dbpass, $dbname))
    {
        die("failed to connect");
    }
?>