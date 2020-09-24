<?php
    require_once 'cekLogin.php';

    $user_id = $_SESSION['user']['id'];

    if($cartCount > 0 && isset($_POST['btn'])) {
        if(isset($_SESSION['grandtotal'])) {
            $grandtotal = $_SESSION['grandtotal'];
            $discount = $_SESSION['disc'];
        } else {
            $grandtotal = $_POST['grandtotal'];
            $discount = 0;
        }

        $sql = "SELECT max(id) as 'id' FROM orders";
        $query = mysqli_query($con,$sql);
        $id = mysqli_fetch_assoc($query)['id']+1;
        $date = date("y-m-d");
        $noOrder = date('Ymd').$id;
        $address = $_POST['address'];
    
        $sql = "INSERT INTO orders(no_order,grandtotal,discount,user_id,order_date,status,address) VALUES('$noOrder',$grandtotal,$discount,$user_id,'$date',1,'$address')";
        $query = mysqli_query($con,$sql);
    
        $sql = "SELECT * FROM cart where user_id = $user_id";
        $query = mysqli_query($con,$sql);

        while($re = mysqli_fetch_array($query)) {
            
            $prod_id = $re['product_id'];
            $quantity = $re['quantity'];
            $variance = $re['variance'];
            $subtotal = $re['subtotal'];
            
            $s = "INSERT INTO order_details(order_id,product_id,quantity,variance,subtotal) values ($id,$prod_id,$quantity,'$variance',$subtotal)";
            $q = mysqli_query($con,$s);
        }

        $sql = "DELETE FROM cart WHERE user_id = $user_id";
        $query = mysqli_query($con,$sql);
        $_SESSION['disc'] = NULL;
        $_SESSION['grandtotal'] = NULL;
    } else {
        header("location: ".$base_url.'/cart.php');
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
    <title>BRAND NAME</title>
</head>
<body>
    <!-- NAVBAR  -->
    <?php
        include 'navbar.php';
    ?>

    <!-- CONTENT -->
    <section class="container mt-4" id="main" >
        <h3>PAYMENT #<?=$noOrder;?></h3>
        <h4 class="ml-3 text-success">Rp. <?=number_format($grandtotal);?></h4>

        <div class="mt-5">
            Transfer to : <br><br>
                <ul class="my-3">
                    <li>
                        <p>BANK CENTRAL ASIA</p>
                        <p>123-456-890  &nbsp; &nbsp; &nbsp;BRAND NAME</p>
                    </li>
                    <li>
                        <p>Bank Rakyat Indonesia &nbsp;</p>
                        <p>987-684-234 &nbsp; &nbsp; &nbsp; BRAND NAME</p>
                    </li>
                </ul>
                  
                
            confirm your payment <a href="<?=$base_url;?>/confirmPayment.php">here</a>
        </div>
    </section>
    <script src="assets/js/script.js"></script>
</body>
</html>