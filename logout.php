<?php
    include('config.php');
    ob_start();
    session_start();
    session_destroy();

    header("location: ".$base_url."/login.php");
?>