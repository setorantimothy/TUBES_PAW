<?php
session_start();
$_SESSION['user'] = 'asd';
$cekCart = 12;
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><strong> BRAND NAME</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav ml-auto">
                <div class="input-group input-group-sm">
                        <input type="search" class="form-control" placeholder="search something..." style="background-color:whitesmoke;width:300px">
                        <div class="input-group-append">
                            <span class="input-group-text bg-dark"><i class="fas fa-search text-white"></i></span>
                        </div>
                    </div>  
                </div>
                        
                <ul class="navbar-nav ml-auto d-flex flex-row">        
                    <li class="nav-item mx-auto">
                        <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i>
                            <?php
                                if($cekCart > 0 )
                                    echo '<span class="badge badge-pill badge-danger">'.$cekCart.'</span>';
                            ?>
                        </a>
                    </li>
                    <?php
                        if(isset($_SESSION['user'])){
                            echo '
                            <li class="nav-item dropdown mx-auto">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" >
                                    '.$_SESSION['user'].'
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Order</a>
                                    <a class="dropdown-item" href="#">Account</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Logout</a>
                                </div>
                            </li>
                            ';
                        } else {
                            echo '<li class="nav-item mx-auto">
                            <a class="nav-link" href="#">Login</a>
                        </li>
                        <li class="nav-item mx-auto">
                            <a class="nav-link" href="#">Register</a>
                        </li>';
                        }
                    ?>

                    
                </ul>
            </div>
        </div>  
    </nav>

    <!-- CONTENT -->
    <section class="container mt-4" id="main" >
        <div class="row">
            <!-- CATEGORY -->
            <div class="sidebar col-md-3 col-3" id="sidebar" >
                <div class="card bg-dark">
                    <div class="card-body text-white">
                        <div class="d-flex justify-content-between">
                            <h6 class="mt-2">Category</h6>
                            <button class="btn btn-dark" id="sidebar-btn" onclick="sidebarToggle()"><i class="fas fa-bars"></i></button>
                        </div>    
                        <hr class="bg-light mb-5">
                        <ul class="container ml-3" style="list-style: none;">
                            <li class="my-4">
                                <a href="#" class="text-white">New Arrival </a>
                            </li>
                            <li class="my-4">
                                <a href="#" class="text-white">Populer</a>
                            </li>
                            <li class="my-4">
                                <a href="#" class="text-white">Hot Sale <i class="fas fa-fire"></i></a>
                            </li>
                            <li class="my-4">
                                <a href="#" data-toggle="collapse" data-target="#menu1" aria-expanded="false" aria-controls="menu1" class="text-white">Man</a>
                                    <div id="menu1" class="collapse ml-3 my-3" data-parent="accordion">
                                        <ul>
                                            <li class="my-2">
                                                <a href="#" class="text-white mt-4">Batik</a>
                                            </li>
                                            <li class="my-2">
                                                <a href="#" class="text-white my-4">Jaket</a>
                                            </li>
                                            <li class="my-2">
                                                <a href="#" class="text-white my-4">Kemeja</a>
                                            </li>
                                            <li class="my-2">
                                                <a href="#" class="text-white my-4">Kaos</a>
                                            </li>
                                        </ul>
                                    </div>
                            </li>
                            <li class="my-4">
                                <a href="#" data-toggle="collapse" data-target="#menu2" aria-expanded="false" aria-controls="menu2" class="text-white">Woman</a>
                                    <div id="menu2" class="collapse ml-3 my-3" data-parent="accordion">
                                        <ul>
                                            <li class="my-2">
                                                <a href="#" class="text-white mt-4">Batik</a>
                                            </li>         
                                            <li class="my-2">
                                                <a href="#" class="text-white my-4">Jaket</a>
                                            </li>
                                            <li class="my-2">
                                                <a href="#" class="text-white my-4">Kemeja</a>
                                            </li>
                                            <li class="my-2">
                                                <a href="#" class="text-white my-4">Kaos</a>
                                            </li>
                                            <li class="my-2">
                                                <a href="#" class="text-white mt-4">Luaran</a>
                                            </li>
                                        </ul>
                                    </div>
                            </li>
                            <li class="my-4">
                                <a href="#" data-toggle="collapse" data-target="#menu3" aria-expanded="false" aria-controls="menu3" class="text-white">Kids</a>
                                    <div id="menu3" class="collapse ml-3 my-3" data-parent="accordion">
                                        <ul>
                                            <li class="my-2">
                                                <a href="#" class="text-white mt-4">Boys</a>
                                            </li>         
                                            <li class="my-2">
                                                <a href="#" class="text-white my-4">Girl</a>
                                            </li>
                                        </ul>
                                    </div>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>

            <!-- PRODUK -->
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
                        <div class="d-flex justify-content-between container">
                            <h4>New Arrival</h4>
                            <button class="btn btn-sm btn-secondary px-3">more</button>
                        </div>

                        <div class="row my-4">
                            <?php
                                for($i=1;$i<=4;$i++){
                                    echo '
                                    <div class="col-md-3 col-6 my-2">
                                        <a href="#" style="text-decoration: none;color:black">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <img src="assets/img/user.jpg" class="img-fluid">
                                                    <div class="row mt-3">
                                                        <div class="col-md-12">
                                                            <h6><strong>nama produk</strong></h6>
                                                            <h6 class="text-secondary">Rp. 180.000</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    ';
                                }
                            ?>
                        </div>
                    </div>
                    <div id="newArrival">
                        <div class="d-flex justify-content-between container">
                            <h4>Recommend</h4>
                            <button class="btn btn-sm btn-secondary px-3">more</button>
                        </div>

                        <div class="row my-4">
                            <?php
                                for($i=1;$i<=4;$i++){
                                    echo '
                                    <div class="col-md-3 col-6 my-2">
                                        <a href="#" style="text-decoration: none;color:black">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <img src="assets/img/user.jpg" class="img-fluid">
                                                    <div class="row mt-3">
                                                        <div class="col-md-12">
                                                            <h6><strong>nama produk</strong></h6>
                                                            <h6 class="text-secondary">Rp. 180.000</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    ';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            <div>
        </div>
    </section>
    <script>
        function sidebarToggle(){
            const sidebar = document.querySelector("#sidebar");
            const productSection = document.querySelector("#productSection");
            sidebar.classList.toggle('toggled');
            productSection.classList.toggle("extendWidth");
            productSection.classList.toggle("col-md-12");
        }
        
    </script>
</body>
</html>