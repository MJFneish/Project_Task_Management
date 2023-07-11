<?php
    function check_login()
    {
        include("connection.php");
        if(isset($_SESSION['user_id'])){
            $user_id = $_SESSION['user_id'];
            $query = "select * from users where user_id = '$user_id'";
            $result =   mysqli_query($conn, $query);
            if($result && mysqli_num_rows($result)>0 )
            {
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }
        header("Location: login.php");
    }
    function check_mode()
    {
        if(isset($_COOKIE['appTheme'])){
            return $_COOKIE['appTheme'];
        }
        setcookie('appTheme', "light", time() + (86400 * 30), "/"); // 86400 = 1 day
        return "light";
    }
    function update_mode() // toggle theme for the website
    {
        if(isset($_COOKIE['appTheme'])){
            $mode = $_COOKIE['appTheme'];
            if($mode == 'light'){
                setcookie('appTheme', "dark", time() + (86400 * 30), "/"); // 86400 = 1 day
                return "dark";
            }
        }
        setcookie('appTheme', "light", time() + (86400 * 30), "/"); // 86400 = 1 day
        return "light";
    }
    function check_active_login_signup()
    {
        if(isset($_COOKIE['loginSignUp'])){
            return $_COOKIE['loginSignUp'];
        }
        setcookie('loginSignUp', "login", time() + (86400 * 30), "/"); // 86400 = 1 day
        return "login";
    }
    function update_active_login_signup($switchTo) // toggle theme for the website
    {
        if($switchTo == 'signup'){
            setcookie('loginSignUp', "signup", time() + (86400 * 30), "/"); // 86400 = 1 day
            return "success";
        }else if ($switchTo == 'login'){
            setcookie('loginSignUp', "login", time() + (86400 * 30), "/"); // 86400 = 1 day
            return "success";
        }
        return "input not supported";
    
    }
    function toggle_open_close_sidebar($close){
        if($close == 'true'){
            setcookie('open_close_sidebar', "", time() + (86400 * 30), "/"); // 86400 = 1 day
            return "success";
        }else if ($close == 'false'){
            setcookie('open_close_sidebar', "close", time() + (86400 * 30), "/"); // 86400 = 1 day
            return "success";
        }
        return "input not supported";
    }
    function check_open_close_sidebar()
    {
        if(isset($_COOKIE['open_close_sidebar'])){
            return $_COOKIE['open_close_sidebar'];
        }
        setcookie('open_close_sidebar', "", time() + (86400 * 30), "/"); // 86400 = 1 day
        return "";
    }
    function write_projects($pathToFile, $user_id){
        include 'connection.php';
        $query = "select * from projects p where p.user_id=".$user_id;
        $result = mysqli_query($conn, $query);
        $array =array();
        if($result && mysqli_num_rows($result) > 0){
            $i=0;
            while($data = mysqli_fetch_assoc($result)){
                $array[] = $data;
            }
            // encode array to json
            $json = json_encode(array('data' => $array));

            // write json to file
            if (file_put_contents($pathToFile, $json)) {
                return true;
            }
        }else if (file_put_contents($pathToFile, json_encode(array('data'=> array())))) {
            return false;
        }
        return false;
    }
    function check_project($project_id, $user_id = NULL){
        include 'connection.php';
        if($user_id === NULL){
            $user_data = check_login();
            $user_id = $user_data['user_id'];
        }
        $query = "select * from projects where project_id=$project_id and  user_id=$user_id";
        $result = mysqli_query($conn, $query);
        if($result && mysqli_num_rows($result) > 0){
            return mysqli_fetch_assoc($result);
        }
        return false;
    }
    function check_task($task_id, $project_id, $user_id = NULL){
        include 'connection.php';
        if($user_id === NULL){
            $user_data = check_login();
            $user_id = $user_data['user_id'];
        }
        $query = "select t.task_id, t.tname, t.start_date, t.deadline_date, t.completed, t.project_id, t.description 
                from tasks t, projects p 
                where p.project_id = t.project_id and  p.user_id=$user_id and p.project_id =$project_id and t.task_id=$task_id ";
        $result = mysqli_query($conn, $query);
        if($result && mysqli_num_rows($result) > 0){
            return mysqli_fetch_assoc($result);
        }
        return false;
    }
    function get_current_project_tasks($pathToFile, $project_id){
        include 'connection.php';
        $query = "select * from tasks where project_id=$project_id";
        $result = mysqli_query($conn, $query);
        $tasks_data = array();
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $tasks_data[] = $row;
            }
            $json = json_encode(array('project_id' => $tasks_data));
            if (file_put_contents($pathToFile, $json)) {
                return $tasks_data;
            }
        } else {
            file_put_contents($pathToFile, json_encode(array('project_id' => array())));
        }
        return false;
    }
    function rand_num($length){
        $text = "";
        if($length < 5) $length =5;
        $len = rand(4,$length);

        for($i=0; $i< $len; $i++)
        {
            $text .= rand(0,9);
        }
        return $text;
    }
    function generatePassword( $length ) {

        $chars = "#abcdefghilkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,$length);
    
    }
?>