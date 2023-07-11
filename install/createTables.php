<?php
include "conn.php";
$conn = connect();
$drop1 = "DROP TABLE IF EXISTS `users`";
$drop2 ="DROP TABLE IF EXISTS `projects`";
$drop3="DROP TABLE IF EXISTS `tasks`;";
if(!mysqli_query($conn, $drop1) || !mysqli_query($conn, $drop2) || !mysqli_query($conn, $drop3) ){
    die("ERROR: Unable to drop tables");
}
$users_table ="CREATE TABLE `users` (
  `user_id` bigint NOT NULL,
  `uname` varchar(45) NOT NULL,
  `uemail` varchar(45) NOT NULL,
  `upass` varchar(45) NOT NULL,
  `registered_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_path` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'assets/images/profile/default-user-image.png',
  `reset_password` varchar(45) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
";
if(!mysqli_query($conn, $users_table)){
    die("ERROR: Could not create users table<br>". mysqli_error($conn));
}
echo "Users table created successfully<br>";

$projects_table ="CREATE TABLE `projects` (
  `project_id` bigint NOT NULL,
  `pname` varchar(45) NOT NULL,
  `client` varchar(45) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deadline_date` date NOT NULL,
  `nbr_tasks` int NOT NULL DEFAULT '0',
  `nbr_tasks_completed` int NOT NULL DEFAULT '0',
  `completed` varchar(45) NOT NULL DEFAULT 'not completed',
  `description` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_id` bigint NOT NULL,
  PRIMARY KEY (`project_id`),
  KEY `user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
";
if(!mysqli_query($conn, $projects_table)){
    die("ERROR: Could not create projects table<br>". mysqli_error($conn));
}
echo "Projects table created successfully<br>";

$tasks_table ="CREATE TABLE `tasks` (
  `task_id` bigint NOT NULL,
  `tname` varchar(45) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deadline_date` date NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `description` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `project_id` bigint NOT NULL,
  PRIMARY KEY (`task_id`),
  KEY `tasks_ibfk_1` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
";
if(!mysqli_query($conn, $tasks_table)){
    die("ERROR: Could not create tasks table<br>". mysqli_error($conn));
}
echo "Tasks table created successfully<br>";
header("location: addConstraints.php");