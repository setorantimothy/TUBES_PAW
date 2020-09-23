<?php
    include '../config.php';
    $id = $_GET['id'];
    if(isset($id)){
        $sql = "DELETE FROM CART WHERE id = $id";
        $query = mysqli_query($con,$sql);
        if($query) {
            $_SESSION['message'] = "success";
        } else {
            $_SESSION['message'] = "failed";
        }
        header("location: ".$base_url.'/cart.php');
    }
?>