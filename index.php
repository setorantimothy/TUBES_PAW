<?php
    include 'config.php';
    
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
        <div class="row">
            <!-- CATEGORY -->
            <?php
                include 'category.php';
            ?>

            <!-- SECTION CONTENT -->
            <div class="col-9 col-md-9 productSection" id="productSection" >
                <div class="row">
                    <div class="col-md-12">
                        <div id="carousel" class="carousel slide mb-3" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel" data-slide-to="1"></li>
                                <li data-target="#carousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="assets/img/1.jpg" class="d-block img-fluid" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/img/2.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/img/3.jpg" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            
                            </div>
                        </div>
                    </div>

                    <div id="newArrival">
                        <div class="d-flex justify-content-between container my-4">
                            <h4>New Arrival</h4>
                            <a href="<?=$base_url;?>/product.php"><button class="btn btn-sm btn-secondary px-3">more</button></a>
                        </div>

                        <div class="row my-4">
                        <?php
                                $sql = "SELECT * FROM product  ORDER BY id DESC LIMIT 4";
                                $query = mysqli_query($con,$sql);
                                $n = mysqli_num_rows($query);
                                if($n<1){
                                    echo '<div class="text-center m-auto"><h3>--Produk tidak ditemukan--</h3></div>';
                                } else {
                                    while($re  = mysqli_fetch_assoc($query)){
                                        echo '
                                        <div class="col-md-3 col-6 my-2">
                                            <a href="'.$base_url.'/product_detail.php?id='.$re['id'].'" style="text-decoration: none;color:black">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <img src="assets/img/'.explode(",",$re['image'])[0].'" class="img-fluid">
                                                        <div class="row mt-3">
                                                            <div class="col-md-12">
                                                                <h6><strong>'.$re['name'].'</strong></h6>
                                                                <h6 class="text-secondary">Rp. '.number_format($re['price']).'</h6>
                                                                <button class="btn btn-sm btn-dark btn-block"><i class="fas fa-eye"></i> Detail</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        ';
                                    }
                                }           
                            ?>
                        </div>
                    </div>
                    
                    <div id="recommend" class="mt-5">
                        <div class="d-flex justify-content-between container">
                            <h4>Recommended</h4>
                            <a href="<?=$base_url;?>/category/index.php?category=hot_sale"><button class="btn btn-sm btn-secondary px-3">more</button></a>
                        </div>
                        <div class="row my-4">
                        <?php
                            $sql = "SELECT * FROM product ORDER BY RAND() LIMIT 4";
                            $query = mysqli_query($con,$sql);
                            $n = mysqli_num_rows($query);
                            if($n<1){
                                echo '<div class="text-center m-auto"><h3>--Produk tidak ditemukan--</h3></div>';
                            } else {
                                
                                while($re  = mysqli_fetch_assoc($query)){
                                    echo '
                                    <div class="col-md-3 col-6 my-2">
                                        <a href="'.$base_url.'/product_detail.php?id='.$re['id'].'" style="text-decoration: none;color:black">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <img src="assets/img/'.explode(",",$re['image'])[0].'" class="img-fluid">
                                                    <div class="row mt-3">
                                                        <div class="col-md-12">
                                                            <h6><strong>'.$re['name'].'</strong></h6>
                                                            <h6 class="text-secondary">Rp. '.number_format($re['price']).'</h6>
                                                            <button class="btn btn-sm btn-dark btn-block"><i class="fas fa-eye"></i> Detail</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    ';
                                }
                            }

                            
                        ?>
                        </div>
                        </div>
                    </div>
                </div>
            <div>

        </div>
    </section>
    <script src="assets/js/script.js"></script>
</body>
</html>