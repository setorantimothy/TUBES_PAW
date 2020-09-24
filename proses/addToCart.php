<?php
    require_once '../cekLogin.php';


    if(isset($_POST['variance']) && isset($_SESSION['isLogin'])) {
        $id = $_POST['id'];
        $variance = $_POST['variance'];
        $user_id = $_SESSION['user']['id'];

        //query get data product
        $sql = "SELECT * FROM product WHERE id = '$id'";
        $query = mysqli_query($con,$sql);
        $prod = mysqli_fetch_assoc($query);
        $price = $prod['price'];
        $stock = $prod['stocks'];

        if($stock == 0) {
            $_SESSION['message'] = "danger";
            header("location: ".$base_url.'/product_detail.php?id='.$id);
        } else {
                //query get data cart untuk cek, update jumlah atau add new product
                $sql = "SELECT * FROM cart where product_id = '$id' && variance = '$variance' && user_id = '$user_id'";
                $query = mysqli_query($con,$sql);
                $n = mysqli_num_rows($query);
        
                if($n>0) { //ada data brarti upate quantity + harga
                    $data_cart = mysqli_fetch_assoc($query);
                    $id_cart = $data_cart['id'];
                    $quantity = $data_cart['quantity'] + 1;
                    $subtotal = $data_cart['subtotal'] + $price;
                    $sql = "UPDATE cart set quantity = $quantity, subtotal = $subtotal WHERE id=$id_cart";
                    $query = mysqli_query($con,$sql);
                } else {
                    $sql = "INSERT INTO cart(product_id,user_id,quantity,variance,subtotal) values($id,$user_id,1,'$variance',$price)";
                    $query = mysqli_query($con,$sql);
                }
                //UPDATE STOCK
                $sql = "UPDATE product SET stocks = $stock-1 where id=$id";
                $query = mysqli_query($con,$sql);
                if($query) {
                    $_SESSION['message'] = "success";
                    header("location: ".$base_url.'/product_detail.php?id='.$id);
                }
            }
        }else {
            $_SESSION['message'] = "FAILED";
            header("location: ".$base_url.'/login.php');
        }
        

?>