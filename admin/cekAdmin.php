<?php
    include '../config.php';
    if(!isset($_SESSION['isLogin'])){
        header("location: ".$base_url.'/login.php');
    }else if(($_SESSION['user']['is_admin']==0))
        header("location: ".$base_url);

?>