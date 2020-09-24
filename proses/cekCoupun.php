<?php
    require_once '../cekLogin.php';

    $coupun = $_POST['coupun'];
    $grandtotal = $_POST['grandtotal'];
    if(isset($coupun)){
        $sql = "SELECT * FROM coupon WHERE name='$coupun'";
        $query = mysqli_query($con,$sql) or die($sql);
        $n = mysqli_num_rows($query);
        if($n> 0) {
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
            $_SESSION['disc'] = NULL;
            $_SESSION['grandtotal'] = NULL;
        }
    }
    header("location: ".$base_url.'/cart.php');
?>