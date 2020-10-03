<?php

$con = mysqli_connect('localhost','rasposmy_root','0FEfmN+$bxGp','rasposmy_paw') or die('Error Connection !');
if($con) {
    //your folder name to index;
    $base_url = "https://".$_SERVER['SERVER_NAME'];
    session_start();
    $activeCategory = "";
    if(isset($_SESSION['isLogin'])) {
        $sql = "SELECT SUM(quantity) as cartCount FROM cart WHERE user_id = ".$_SESSION['user']['id'];
        $query = mysqli_query($con,$sql);
        $cartCount = mysqli_fetch_assoc($query)['cartCount'];
    } else {
        $cartCount = 0;
    }
}

?>