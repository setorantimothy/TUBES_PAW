<?php
    require_once 'cekLogin.php';
    $user_id = $_SESSION['user']['id'];
    
    if($_SESSION['user']['address']==null){
        $_SESSION['msg'] = "fill your address first !";
        $_SESSION['status'] = "danger";
        header('location: '.$base_url.'/myAccount.php');
     } else {
        $address = $_SESSION['user']['name'].' &nbsp;&nbsp; '.$_SESSION['user']['phone_number'].'<br>'.$_SESSION['user']['address'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <title>CART - BRAND NAME</title>
</head>
<body>
    <!-- NAVBAR  -->
    <?php
        include 'navbar.php';
    ?>

    <!-- CONTENT -->
    <section class="container mt-4" id="main" >
        <?php 
        if(isset($_SESSION['message'])) {
            echo '<div class="alert alert-'.$_SESSION['message'].'">';
                if($_SESSION['message']=="success")
                    echo 'Success delete product from cart !';
                else
                    echo 'Something was wrong !';
            echo '</div>';
            //init message , when refresh message doesnt show
            $_SESSION['message']= null;
            }
        ?>
        <div class="row ">
            <div class="col-md-8">
                <div class="card bg-dark">
                    <div class="card-body text-white">
                        <h5 class="mt-2">Cart</h5>
                        <hr class="bg-light">
                    </div>
                    <div class="row container ml-3">
                        <?php
                            $sql = "SELECT cart.*,cart.id as 'cart_id',product.* FROM cart JOIN product on product.id = cart.product_id WHERE user_id = $user_id";
                            $query = mysqli_query($con,$sql);
                            $grandtotal = 0;
                            $n = mysqli_num_rows($query);

                            if($n>0) {
                                while($re = mysqli_fetch_assoc($query)) {
                                    $image = explode(",",$re['image'])[0];
                                    $name = $re['name'];
                                    $id = $re['cart_id'];
                                    $variance = $re['variance'];
                                    $price = $re['subtotal'];
                                    $quantity = $re['quantity'];
                                    $grandtotal += $re['subtotal'];
                                    $stocks = $re['stocks'];
                                ?>
                                <div class="col-md-12 row my-3">
                                    <div class="col-md-3">
                                        <div class="card" style="width: 8rem;height:fit-content;">
                                            <img src="<?=$base_url;?>/assets/img/<?=$image;?>" class="card-img-top cart-img" style="max-height: 100px;width:auto">
                                        </div>
                                    </div>
                                    <div class="col-md-7 text-white">
                                        <h5><?=$name;?></h5>
                                        <div class="d-flex justify-content-between">
                                        Size : <?=$variance;?><br>
                                        <span class="text-success"> Rp.<?=number_format($price);?></span>
                                        
                                        </div>
                                    <div class="d-flex mt-2 justify-content-between">
                                            Quantity : <?=$quantity;?>
                                            <a href="<?=$base_url;?>/proses/deleteCart.php?id=<?=$id;?>"><button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></a>
                                        </div>
                                    </div>
                                    
                                </div>
                                <?php
                            }
                                    } else {
                                        echo '<h3 class="text-white text-center mb-5">..Nothing here, lets shoping..';
                                    }
                                ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="min-height: 100vh;">
                <div class="card bg-dark">
                    <div class="card-body text-white">
                        <h6 class="mt-2">Payment Info</h6>
                        <?= $address;?>
                        <hr class="bg-light">
                        <form action="<?=$base_url;?>/proses/cekCoupun.php" method="post" class="mt-5">
                            <div class="row container my-5">
                                <div class="col-md-9">
                                    <input type="text" name="coupun" placeholder="coupun.." id="coupun" class="form-control">
                                    <input type="hidden" name="grandtotal" value="<?=$grandtotal;?>">
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-secondary">apply</button>
                                </div>
                            </div>
                        </form>


                        <div class="container d-flex justify-content-between">
                            <div>
                                Subtotal &nbsp; :<br>
                                <span class="discont <?php if(isset($_SESSION['disc'])) echo 'd-block'; else echo 'd-none';?>">Discount &nbsp;:</span>
                            </div>
                            <div>
                                Rp. <?=number_format($grandtotal);?><br>
                                <span class="discont <?php if(isset($_SESSION['disc'])) echo 'd-block'; else echo 'd-none';?>"><?php if(isset($_SESSION['disc'])) echo'Rp. '. number_format($_SESSION['disc'])?></span>
                            </div>
                        </div>
                        <hr class="bg-light my-5">
                        <div class="container d-flex justify-content-between mb-4">
                            <div>
                                <span class="total ">Total &nbsp;:</span>
                            </div>
                            <div>
                                <span class="total" id="total">
                                    <?php 
                                    if(isset($_SESSION['disc'])) {echo'Rp. '. number_format($_SESSION['grandtotal']);} else {echo'Rp. '. number_format($grandtotal);}?></span>
                            </div>
                        </div>
                        <div class="container">
                            <div class="col-md-12">
                                <form action="<?=$base_url;?>/checkout.php" method="post">
                                    <input type="hidden" name="grandtotal" value="<?=$grandtotal;?>">
                                    <input type="hidden" name="address" value="<?=$address;?>">
                                    <button type="submit" name="btn" class="btn-block btn btn-secondary">Checkout</button>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <script src="assets/js/script.js"></script>
</body>
</html>