<?php
    include 'config.php';
    if(isset($_GET['id'])){
       $id = $_GET['id'];
       
    }else {
        header("location: ".$base_url);
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
    
    <section class="container mt-5" id="main" >
        <?php 
        if(isset($_SESSION['message']) && isset($_SESSION['isLogin'])) {
            echo '<div class="alert alert-'.$_SESSION['message'].'">';
                if($_SESSION['message']=="success")
                    echo 'Success add product to cart !';
                else
                    echo 'This Product Has no stock ! please find other one';
            echo '</div>';
            //init message , when refresh message doesnt show
            $_SESSION['message']= null;
            }
        ?>
        <div class="row">
            <div class="col-md-5">
                <div id="carousel" class="carousel slide mb-3" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php
                            $sql = "SELECT * FROM PRODUCT where id = '$id'";
                            $query = mysqli_query($con,$sql);
                            $re = mysqli_fetch_assoc($query);
                            $img = explode(",",$re['image']);
                            $name = $re['name'];
                            $id = $re['id'];
                            $price = $re['price'];
                            $desc = $re['description'];
                            $stock = $re['stocks'];
                            if(count($img)>1){
                                echo '<li data-target="#carousel" data-slide-to="0" class="active"></li>';
                                for ($i=2 ;$i<=count($img); $i++) {
                                echo '<li data-target="#carousel" data-slide-to="1"></li>';
                                }
                            }
                        ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php
                            $img = explode(",",$re['image']);
                            for ($i=0; $i < count($img); $i++) {
                                echo '
                                <div class="carousel-item ';
                                if($i==0) echo 'active';
                                echo '">
                                    <img src="assets/img/'.$img[$i].'" class="d-block img-fluid slider-product">
                                </div>
                                ';
                            }
                            ?>
                    </div>

                    <?php
                        if($i>1)
                        {
                            echo '
                            <a class="carousel-control-prev bg-dark" href="#carousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next bg-dark" href="#carousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        ';
                        }
                        ?>
                </div>
            </div>
            
            <div class="col-md-7">
                <h2><?=$name;?></h2>
                <div class="form-group d-flex pl-n4 ml-n5 row col-md-6 my-4" style="margin-left: -1.7rem;">
                    <label for="variance" class="col-md-5 col-form-label">Variance : </label>
                    <div class="col-md-6">
                        <form action="<?=$base_url;?>/proses/addToCart.php" method="post">
                            <select class="custom-select" required id="variance" name="variance">
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                    </div>
                    
                </div>
                <div class="container row d-flex justify-content-between">
                    <input type="hidden" name="id" value="<?=$id;?>">
                    <h5 class="text-success" id="price">Rp. <?=number_format($price);?></h5>
                    <button class="btn btn-sm btn-dark" id="addCartBtn"><i class="fas fa-plus"></i> &nbsp; Cart</button>
                        </form>
                </div>
                <div class="my-4">
                    <label>Description : </label> <br>
                    <p class="ml-4 mt-2"><?=$desc;?></p>
                </div>
            </div>
        </div>
    </section>  
    <script src="<?=$base_url;?>/assets/js/script.js"></script>
</body>
</html>