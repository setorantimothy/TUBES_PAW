<?php
    require_once '../cekLogin.php';

    $coupun = $_POST['coupun'];
    $grandtotal = $_POST['grandtotal'];
    if(isset($coupun)){
        $sql = "SELECT * FROM COUPON WHERE name='$coupun'";
        $query = mysqli_query($con,$sql) or die($sql);
        if($query) {
            $re = mysqli_fetch_assoc($query);
            $disc = $re['disc'];
            if($disc > 99) {
                $grandtotal = $grandtotal - $disc;
            } else {
                $disc = $grandtotal * ($disc/100.0);
                $grandtotal = $grandtotal - $disc;
            }
            $_SESSION['disc'] = $disc;
            $_SESSION['grandtotal'] = $grandtotal;
        } else {
            $_SESSION['message'] = "success";
        }
        header("location: ".$base_url.'/cart.php');
    }
?>