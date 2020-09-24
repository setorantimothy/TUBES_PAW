<?php
    include 'config.php';
    if(!isset($_SESSION['isLogin'])){
        header("location: ".$base_url.'/login.php');
    }
?>