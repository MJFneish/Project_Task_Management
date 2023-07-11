<?php
    include("functions.php");
    if(isset($_POST['switchTo'])){
        echo update_active_login_signup($_POST['switchTo']);
    }else{
        echo "post request is not available" ;
    }
?>