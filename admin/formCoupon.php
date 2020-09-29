<?php
    require_once 'cekAdmin.php';
    $user_id = $_SESSION['user']['id'];

    if(!isset($_GET['key'])){
        header("location: ".$base_url.'/admin');
    }else if($_GET['key']=="Add" || $_GET['key']=="Update"){
        $key = $_GET['key'];
        if($key == "Update"){
            $id = $_GET['id'];
            $sql = "select * from coupon where id=$id";
            $query = mysqli_query($con,$sql);
            $n =mysqli_num_rows($query);
            if($n < 1){
                header("location: Coupons.php");
            }else {
                $re = mysqli_fetch_assoc($query);
                $name = $re['name'];
                $disc = $re['disc'];
            }
        }
    }else {
        header("location: ".$base_url.'/admin/Coupons.php');
    }
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
    
    <title>Coupons Admin Page - BRAND NAME</title>
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
            <div class="container" id="content">
                <div class="mt-5 container">
                   <div class="d-flex justify-content-center">
                       <div class="card" style="width: 500px">
                            <div class="card-header bg-info text-white"><?=$key;?> Coupon</div>
                            <div class="card-body">
                                <form action="<?=$base_url;?>/admin/couponProses.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" required class="form-control" value="<?php if(isset($name) && $name!="" && $key=="Update") echo $name; ?>" name="name" placeholder="product name">
                                    </div>
                                    <div class="form-group mr-2">
                                        <label for="Disc">Discount</label>
                                        <input type="number" min="1" required class="form-control" value="<?php if(isset($disc) && $disc!="" && $key=="Update") echo $disc; ?>" name="disc" placeholder="50.000">
                                    </div>
                                    <div class="alert alert-warning alert-sm">
                                        <small><strong>NOTE : </strong></small><br>
                                        *<strong>Input discout  1-100</strong> otomatis terdeteksi discount persen (10 = discount 10%)
                                        <br>*<strong>Input discout  > 100</strong> otomatis terdeteksi discount potongan harga (1000 = -1000 rupiah)
                                    </div>
                                    <input type="hidden" name="key" value="<?=$key;?>" readonly>
                                    <input type="hidden" name="id" value="<?=$id;?>" readonly>
                                    <button class="btn btn-block w-60 btn-info mt-4" type="submit" name="btn"><i class="fas fa-floppy-o"></i> <?=$key;?></button>
                                </form>
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