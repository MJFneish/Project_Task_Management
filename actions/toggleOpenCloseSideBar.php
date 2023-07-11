<?php
include("functions.php");
if(isset($_POST['close'])){
    echo toggle_open_close_sidebar($_POST['close']);
}else{
    echo "post request is not available";
}
?>