<?php
include "conn.php";
$conn = connect();
$constraints1 = "ALTER TABLE `projects` 
                ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE";
$constraints2 = "ALTER TABLE `tasks`
                ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE";

if(!mysqli_query($conn, $constraints1) || !mysqli_query($conn, $constraints2)){
    die("ERROR: Could not add foreign keys<br>". mysqli_error($conn));
}
echo "all foreign keys created successfully";
header('location: createProcedures.php');