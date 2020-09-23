<?php

$con = mysqli_connect('localhost','root','','tubes_paw') or die('Error Connection !');
if($con) {
    //your folder name to index;
    $base_url = "http://".$_SERVER['SERVER_NAME'].'/paw/tubes';
    session_start();
    //develop, without login
    if(isset($_SESSION['isLogin'])) {
        $sql = "SELECT COUNT(quantity) as cartCount FROM cart WHERE user_id = ".$_SESSION['user']['id'];
        $query = mysqli_query($con,$sql);
        $cartCount = mysqli_fetch_assoc($query)['cartCount'];
    } else {
        $cartCount = 0;
    }
}

?>