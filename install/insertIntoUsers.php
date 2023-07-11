<?php
include "conn.php";
$conn = connect();
$delete1 = "DELETE FROM users";
$delete2 = "DELETE FROM projects";
$delete3 = "DELETE FROM tasks";

if(!mysqli_query($conn, $delete3) || !mysqli_query($conn, $delete2) || !mysqli_query($conn, $delete1) ){
    echo("ERROR: Couldn't delete all inserted records");
}
/*
--
-- Dumping data for table `users`
--
*/
$users = "INSERT INTO `users` (`user_id`, `uname`, `uemail`, `upass`, `registered_time`, `profile_path`, `reset_password`) VALUES
(30528406536, 'Laurie Gerlach', 'rutherford.aidan@hotmail.com', 'eJvVZQ7)', '2023-04-07 16:03:49', 'assets/images/profile/default-user-image.png', '0'),
(68275172111, 'Theodore Dooley III', 'aaron.robel@gmail.com', 'g(it', '2023-04-07 16:03:49', 'assets/images/profile/default-user-image.png', '0'),
(139461427028, 'Joanny Denesik', 'carter.clementina@walsh.info', 'vya_', '2023-04-07 16:03:50', 'assets/images/profile/default-user-image.png', '0'),
(162804498262, 'Ms. Tiana Kozey V', 'mackenzie.altenwerth@gmail.com', 'cfS2^hC&H', '2023-04-07 16:03:47', 'assets/images/profile/default-user-image.png', '0'),
(219777618684, 'Marcus Veum II', 'lenny18@yahoo.com', 'wXc!', '2023-04-07 16:03:48', 'assets/images/profile/default-user-image.png', '0'),
(222336887000, 'Jaquelin Weimann', 'macie23@harber.com', 'HSk#', '2023-04-07 16:03:48', 'assets/images/profile/default-user-image.png', '0'),
(258041702999, 'Missouri Turner', 'meagan.renner@swaniawski.biz', 's5$0k.g', '2023-04-07 16:03:49', 'assets/images/profile/default-user-image.png', '0'),
(260083501088, 'Mr. Nathanial Schinner IV', 'christop14@gmail.com', 'l@1gABhvU', '2023-04-07 16:03:47', 'assets/images/profile/default-user-image.png', '0'),
(286648028183, 'Theodore Spencer IV', 'kaela.oberbrunner@hotmail.com', 'Eiz)trZ', '2023-04-07 16:03:49', 'assets/images/profile/default-user-image.png', '0'),
(294971227805, 'Dr. Antone Sauer I', 'ferne.nicolas@hotmail.com', ')XP7l', '2023-04-07 16:03:49', 'assets/images/profile/default-user-image.png', '0'),
(411958870000, 'Marlee Kunze', 'bednar.onie@hotmail.com', '0DO4l-_.o', '2023-04-07 16:03:49', 'assets/images/profile/default-user-image.png', '0'),
(419233227464, 'Piper Considine DDS', 'fahey.lexi@gmail.com', 'vh23$', '2023-04-07 16:03:50', 'assets/images/profile/default-user-image.png', '0'),
(452883951353, 'Euna Roberts', 'xshanahan@ratke.biz', '.gxu$', '2023-04-07 16:03:49', 'assets/images/profile/default-user-image.png', '0'),
(711447043105, 'Llewellyn Bauch', 'walter.jayme@yahoo.com', 'O@vfI*C', '2023-04-07 16:03:48', 'assets/images/profile/default-user-image.png', '0'),
(758021117611, 'Prof. Jodie Dicki Sr.', 'rahul58@bailey.net', 'U#bVe@YR', '2023-04-07 16:03:49', 'assets/images/profile/default-user-image.png', '0'),
(787378120619, 'Wilford Wehner', 'jacobson.oliver@swift.com', 'QYR-yHLI', '2023-04-07 16:03:49', 'assets/images/profile/default-user-image.png', '0'),
(820901643448, 'Ms. Laisha Mayert Jr.', 'judd.hagenes@yahoo.com', 'G^)U0qFrK', '2023-04-07 16:03:49', 'assets/images/profile/default-user-image.png', '0'),
(860674783587, 'Hasan AlBeiruty', 'Hassanalbeiruty@gmail.com', '123', '2023-04-07 16:03:49', 'assets/images/profile/1681221742-image-404373a4ab6dd0cec73a141f5ba2bb71.jpg', '0'),
(930049141396, 'Jawad Fneish', 'fneishm1234@gmail.com', '123', '2023-04-07 16:03:47', 'assets/images/profile/1681221626-image-03e16de2eccd6c66db06b556063d084e.jpg', '0'),
(955112373446, 'mjf', 'fneishm123@gmail.com', '123', '2023-04-07 16:03:49', 'assets/images/profile/1681221689-image-8a7334be0d9d1d72b03465cae12c3082.jpg', '0');
";

if( !mysqli_query($conn, $users)){
    die("ERROR: Couldn't insert into users");
}
echo "All users inserted";
header("Location: insertIntoProjects.php");
