<?php
    require_once 'cekLogin.php';
    $user_id = $_SESSION['user']['id'];
    
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
    <title>ORDER - BRAND NAME</title>
</head>
<body>
    <!-- NAVBAR  -->
    <?php
        include 'navbar.php';
    ?>

    <!-- CONTENT -->
    <section class="container mt-5" id="main" >
        <h3>My Order</h3>   
        <div class="row mt-4">
            <div class="col-md-12">
                <table class="table table-responsive table-hovered table-striped">
                    <tr>
                        <th>No Order</th>
                        <th>Date</th>
                        <th>Grandtotal</th>
                        <th>Discount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                <?php
                    $sql = "SELECT * FROM orders where user_id=$user_id ORDER BY id DESC ";
                    $query = mysqli_query($con,$sql);
                    while($re = mysqli_fetch_assoc($query)){
                        $id = $re['id'];
                        $noOrder = $re['no_order'];
                        $date = $re['order_date'];
                        $grandtotal = $re['grandtotal'];
                        $discount = $re['discount'];
                        $status = $re['status'];
                        ?>
                
                    <tr>
                        <td><?=$noOrder;?></td>
                        <td><?=$date;?></td>
                        <td><?=number_format($grandtotal);?></td>
                        <td><?=number_format($discount);?></td>
                        <td>
                            <?php
                                switch($status) {
                                    case 1:
                                        echo '<span class="badge badge-warning">Waiting for payment</span>';
                                        break;
                                    case 2:
                                        echo '<span class="badge badge-primary">On Process</span>';
                                        break;
                                    case 3:
                                        echo '<span class="badge badge-success">Complete Order</span>';
                                        break;
                                    case 4:
                                        echo '<span class="badge badge-danger">Canceled</span>';
                                        break;
                                }
                            ?>
                        </td>
                        <td>
                            <a class="btn btn-success btn-sm" href="confirmPayment.php?no_order=<?=$noOrder;?>"><i class="fas fa-credit-card"></i> Verif Payment</a>
                            <a class="btn btn-primary btn-sm" href="orderDetail.php?id=<?=$noOrder;?>&key=<?=$id;?>"><i class="fas fa-list-alt"></i> Detail</a>
                        </td>
                    </tr>
                    <?php
                    }
                ?>
                </table>
            </div>
        </div>
    </section>
    <script src="assets/js/script.js"></script>
</body>
</html>