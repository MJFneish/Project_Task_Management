<?php
function connect(){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "mjf_mhb_taskmanager";

    if(!$conn = mysqli_connect($dbhost,$dbuser, $dbpass, $dbname)){
        die("ERROR: Could not connect. " . mysqli_connect($conn));
    }
    return $conn;
}
