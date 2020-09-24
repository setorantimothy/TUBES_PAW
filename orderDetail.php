<?php
    require_once 'cekLogin.php';
    $user_id = $_SESSION['user']['id'];
    $noOrder = $_GET['id'];
    $id = $_GET['key'];
    $sql = "SELECT grandtotal,discount from orders where id = $id";
    $query = mysqli_query($con,$sql);
    $re = mysqli_fetch_assoc($query);
    $gt = $re['grandtotal'];
    $disc = $re['discount'];
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
    <section class="container my-5" id="main" >
        <h3>Order Detail &nbsp; #<?=$_GET['id'];?></h3>
        <div class="row my-4">
            <div class="col-md-12">
                <table class="text-center table table-dark table-hover table-striped">
                    <tr>
                        <th>Product</th>
                        <th>Variance</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                    <?php
                        $sql = "SELECT od.*, p.* FROM order_details od JOIN
                        product p on p.id = od.product_id where order_id = $id";
                        $query = mysqli_query($con,$sql);
                        $i = 0;

                        while($re = mysqli_fetch_assoc($query)){
                            $name = $re['name'];
                            $variance = $re['variance'];
                            $quantity = $re['quantity'];
                            $subtotal = $re['subtotal'];
                            $i++;
                            ?>
                    
                        <tr>
                            <td><?=$i.'.&nbsp'.$name;?></td>
                            <td><?=$variance;?></td>
                            <td>x<?=$quantity;?></td>
                            <td><?=number_format($subtotal);?></td>
                        </tr>
                        <?php
                        }
                        if($disc > 0) {
                            echo '<tr>
                                    <td colspan="3">Discount</td>
                                    <td>'.number_format($disc).'</td>
                                </tr>';
                        }
                    ?>
                        <tr>
                            <td colspan="3" style="background-color:whitesmoke;color:black" class="text-right">Grandtotal</td>
                            <td><?=number_format($gt);?></td>
                        </tr>
                    
                        
                </table>
            </div>
        </div>
    </section>
    <script src="assets/js/script.js"></script>
</body>
</html>