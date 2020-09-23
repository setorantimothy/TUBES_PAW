<?php

$conn = mysqli_connect('localhost','root','','tubes_paw') or die('Error Connection !');
if($conn) {
    //your folder name to index;
    $base_url = "http://".$_SERVER['SERVER_NAME'].'/paw/tubes';
    //develop, without login
    $_SESSION['user'] = null;
    if(isset($_SESSION['user'])) {
        $cartCount;
    }
    $cartCount = 0;
}

?>