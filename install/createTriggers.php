<?php
include "conn.php";
$conn = connect();
$drop1 = "DROP TRIGGER IF EXISTS `update_project_completed`;";
$drop2 = "DROP TRIGGER IF EXISTS `decrement_nbr_tasks`;";
$drop3 = "DROP TRIGGER IF EXISTS `increment_nbr_tasks`;";
$drop4 = "DROP TRIGGER IF EXISTS `update_nbr_tasks_completed`;";
$drop5 = "DROP TRIGGER IF EXISTS `delete_related_project`;";
$drop6 = "DROP TRIGGER IF EXISTS `reset_password_default`;";
if( !mysqli_query($conn, $drop1) || 
    !mysqli_query($conn, $drop2) || 
    !mysqli_query($conn, $drop3) || 
    !mysqli_query($conn, $drop4) || 
    !mysqli_query($conn, $drop5) || 
    !mysqli_query($conn, $drop6)){
    die("ERROR: Unable to drop triggers");
}
$trigger1 = "CREATE TRIGGER `update_project_completed` BEFORE UPDATE ON `projects` FOR EACH ROW BEGIN
	IF NEW.nbr_tasks = NEW.nbr_tasks_completed THEN
         SET NEW.completed = 'completed';
    ELSEIF OLD.completed = 'completed' AND NEW.nbr_tasks > NEW.nbr_tasks_completed  THEN
        SET NEW.completed = 'not completed';
    END IF;
END;";
$trigger2 = "CREATE TRIGGER `decrement_nbr_tasks` AFTER DELETE ON `tasks` FOR EACH ROW BEGIN
    UPDATE projects
    SET nbr_tasks = nbr_tasks - 1
    WHERE projects.project_id = OLD.project_id;
END;";
$trigger3 = "CREATE TRIGGER `increment_nbr_tasks` AFTER INSERT ON `tasks` FOR EACH ROW BEGIN
    UPDATE projects SET nbr_tasks = nbr_tasks + 1 WHERE projects.project_id = NEW.project_id;
END;";
$trigger4 = "CREATE TRIGGER `update_nbr_tasks_completed` AFTER UPDATE ON `tasks` FOR EACH ROW BEGIN
	IF OLD.completed < NEW.completed THEN
        UPDATE projects
        SET nbr_tasks_completed = nbr_tasks_completed + 1
        WHERE projects.project_id = NEW.project_id;
	END IF;
	IF OLD.completed > NEW.completed THEN
        UPDATE projects
        SET nbr_tasks_completed = nbr_tasks_completed - 1
        WHERE projects.project_id = NEW.project_id;
	END IF;
END;";
$trigger5 = "CREATE TRIGGER `delete_related_project` BEFORE DELETE ON `users` FOR EACH ROW BEGIN
CALL delete_user_projects(OLD.user_id);
END;";
$trigger6 ="
CREATE TRIGGER `reset_password_default` BEFORE UPDATE ON `users` FOR EACH ROW BEGIN
     IF NEW.upass != OLD.upass THEN
        SET NEW.reset_password = 0;
    END IF;
END;";

if( !mysqli_query($conn, $trigger1) ||
    !mysqli_query($conn, $trigger2) ||
    !mysqli_query($conn, $trigger3) ||
    !mysqli_query($conn, $trigger4) ||
    !mysqli_query($conn, $trigger5) ||
    !mysqli_query($conn, $trigger6)){
    die('ERROR: Could not create procedures<br>'. mysqli_error($conn));
}


echo "Triggers created successfully";
header("Location: insertIntoUsers.php");
