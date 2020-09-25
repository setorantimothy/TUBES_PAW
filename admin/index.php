<?php
    require_once 'cekAdmin.php';
    $user_id = $_SESSION['user']['id'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/script.js" defer></script>
    
    <title>DASHBOARD ADMIN PAGE - BRAND NAME</title>
</head>
<body>
    <!-- NAVBAR  -->
    <?php
        include '../navbar.php';
    ?>

    <!-- CONTENT -->
    <section id="main">
        <div class="row">
            <?php
                include 'sidebar.php';
            ?>
            <div id="content" class="col-md-12">
                <div class="mt-4">
                    <div class="row mx-auto">
                        <div class="col-md-3 col-6">
                            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                <div class="card-header">Products</div>
                                    <div class="card-body">
                                        <?php
                                            $sql="select count(*) as 'products' from product";
                                            $query= mysqli_query($con,$sql);
                                            $products = mysqli_fetch_assoc($query)['products'];
                                        ?>
                                        <h5 class="card-title text-center"><?=$products;?> Item</h5>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                <div class="card-header">Active Users</div>
                                    <div class="card-body">
                                        <?php
                                            $sql="select count(*) as 'users' from users where is_verified=1";
                                            $query= mysqli_query($con,$sql);
                                            $users = mysqli_fetch_assoc($query)['users'];
                                        ?>
                                        <h5 class="card-title text-center"><?=$users;?> User</h5>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                <div class="card-header">Orders</div>
                                    <div class="card-body">
                                        <?php
                                            $sql="select count(*) as 'orders' from orders";
                                            $query= mysqli_query($con,$sql);
                                            $orders = mysqli_fetch_assoc($query)['orders'];
                                        ?>
                                        <h5 class="card-title text-center"><?=$orders;?> Order</h5>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                                <div class="card-header">Income</div>
                                    <div class="card-body">
                                        <?php
                                            $sql="select sum(grandtotal) as 'total' from orders";
                                            $query= mysqli_query($con,$sql);
                                            $total = mysqli_fetch_assoc($query)['total'];
                                        ?>
                                        <h5 class="card-title text-center">Rp. <?=number_format($total);?></h5>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                                <div class="card-header">Category</div>
                                    <div class="card-body">
                                        <?php
                                            $sql="select count(*) as 'categories' from category";
                                            $query= mysqli_query($con,$sql);
                                            $categories = mysqli_fetch_assoc($query)['categories'];
                                        ?>
                                        <h5 class="card-title text-center"><?=$categories;?> Category</h5>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card bg-light mb-3" style="max-width: 18rem;">
                                <div class="card-header">Coupons</div>
                                    <div class="card-body">
                                        <?php
                                            $sql="select count(*) as 'coupon' from coupon";
                                            $query= mysqli_query($con,$sql);
                                            $coupon = mysqli_fetch_assoc($query)['coupon'];
                                        ?>
                                        <h5 class="card-title text-center"><?=$coupon;?> Coupon</h5>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
            
        </div>
    </section>
    <script>
        function sidebarToggle(){
            const sidebar = document.querySelector("#sidebar");
            const content = document.querySelector("#content");
            sidebar.classList.toggle('toggledSidebar');
        }
    </script>
</body>
</html>