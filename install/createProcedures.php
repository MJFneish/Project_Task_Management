<?php
include "conn.php";
$conn = connect();

$drop1 = "DROP PROCEDURE IF EXISTS `delete_project_tasks`";
$drop2 = "DROP PROCEDURE IF EXISTS `delete_user_projects`";
$drop3 = "DROP PROCEDURE IF EXISTS `mark_project_tasks_completed`";
$drop4 = "DROP PROCEDURE IF EXISTS `mark_project_tasks_uncompleted`";
$drop5 = "DROP PROCEDURE IF EXISTS `update_nbr_tasks`";
$drop6 = "DROP PROCEDURE IF EXISTS `update_nbr_tasks_completed`";

if( !mysqli_query($conn, $drop1) ||
    !mysqli_query($conn, $drop2) ||
    !mysqli_query($conn, $drop3) ||
    !mysqli_query($conn, $drop4) ||
    !mysqli_query($conn, $drop5) ||
    !mysqli_query($conn, $drop6)){
    echo("ERROR: Unable to drop procedures");
}

$procedure1 = "CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_project_tasks` (IN `p_project_id` BIGINT) BEGIN 
    DELETE FROM tasks WHERE tasks.project_id = p_project_id; 
END;";
$procedure2 = "CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_user_projects` (IN `p_user_id` BIGINT)  BEGIN
    DELETE FROM projects WHERE projects.user_id = p_user_id;
END;
";
$procedure3 = "CREATE DEFINER=`root`@`localhost` PROCEDURE `mark_project_tasks_completed` (IN `p_project_id` BIGINT)  BEGIN
    UPDATE tasks SET completed = 1 WHERE project_id = p_project_id;
END;";
$procedure4 = "CREATE DEFINER=`root`@`localhost` PROCEDURE `mark_project_tasks_uncompleted` (IN `p_project_id` BIGINT)  BEGIN
    UPDATE tasks SET completed = 0 WHERE project_id = p_project_id;
END;
";
$procedure5 = "CREATE DEFINER=`root`@`localhost` PROCEDURE `update_nbr_tasks` ()  BEGIN
    DECLARE done INT DEFAULT FALSE;
    DECLARE pid BIGINT;
    DECLARE cur CURSOR FOR SELECT project_id FROM projects;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
    
    OPEN cur;
    
    my_loop: LOOP
        FETCH cur INTO pid;
        IF done THEN
            LEAVE my_loop;
        END IF;
        
        UPDATE projects p
        SET p.nbr_tasks = (SELECT COUNT(*) FROM tasks WHERE tasks.project_id = p.project_id)
        WHERE p.project_id = pid;
    END LOOP;
    
    CLOSE cur;
END;
";

$procedure6 = "CREATE DEFINER=`root`@`localhost` PROCEDURE `update_nbr_tasks_completed`()
BEGIN
    DECLARE done INT DEFAULT FALSE;
    DECLARE pid BIGINT;
    DECLARE cur CURSOR FOR SELECT project_id FROM projects;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
    
    OPEN cur;
    
    my_loop: LOOP
        FETCH cur INTO pid;
        IF done THEN
            LEAVE my_loop;
        END IF;
        
        UPDATE projects p
        SET p.nbr_tasks_completed = (SELECT COUNT(*) FROM tasks WHERE tasks.project_id = p.project_id AND tasks.completed = 1)
        WHERE p.project_id = pid;
    END LOOP;
    
    CLOSE cur;
END;
";

if(!mysqli_query($conn, $procedure1) ||
    !mysqli_query($conn, $procedure2) ||
    !mysqli_query($conn, $procedure3) ||
    !mysqli_query($conn, $procedure4) ||
    !mysqli_query($conn, $procedure5) ||
    !mysqli_query($conn, $procedure6)){
    die('ERROR: Could not create procedures<br>'. mysqli_error($conn));
}


echo "procedures created successfully";
header("Location: createTriggers.php");
