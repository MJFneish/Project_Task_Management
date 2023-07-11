<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "mjf_mhb_taskmanager";

if(!$conn = mysqli_connect($dbhost,$dbuser, $dbpass)){
    die("ERROR: Could not connect. " . mysqli_connect($conn));
}

$query = "drop database if exists ". $dbname;
mysqli_query($conn,$query);

$query = "create database ".$dbname;
if(!mysqli_query($conn,$query)){
    die("ERROR: Could not create database. " . "\n". mysqli_connect_error());
}
header("Location: createTables.php");