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
                <div class="mt-4 container">
                    <h2>Coupons : </h2><hr>
                    <div class="d-flex justify-content-between mb-4">
                        <a href="<?=$base_url;?>/admin/formCoupon.php?key=Add" class="btn btn-success mb-2 btn-sm"><i class="fas fa-plus"></i> &nbsp;Coupon</a href="<?=$base_url;?>/admin/formProduct.php">
                        <div class="ml-auto">
                            <form action="" method="get">
                                <input type="text" name="q" class="form-control" placeholder="search..">
                            </form>
                        </div>
                    </div>
                    <table class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>    
                        <tbody>
                            <?php
                                $sql = "select * from coupon";
                                if(isset($_GET['q'])){
                                    $q = $_GET['q'];
                                    $sql = $sql." where name like '%$q%' or disc like '%$q%'";
                                }
                                $query = mysqli_query($con,$sql);
                                $no = 1;
                                while($re = mysqli_fetch_assoc($query)){
                                    $no = $no++;
                                    $id = $re['id'];
                                    $name = $re['name'];
                                    $disc = $re['disc'];
                                    if($disc > 100){
                                        $disc_str ="Rp. ".number_format($disc);
                                    }else {
                                        $disc_str = $disc.' %';
                                    }
                                ?>
                            <tr>
                                <td>#<?=$no;?></td>
                                <td><?=$name;?></td>
                                <td><?=$disc_str;?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm mb-1 mr-1" href="<?=$base_url;?>/admin/formCoupon.php?key=Update&id=<?=$id;?>"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm mb-1 mr-1" onclick="del('<?=$id;?>')"><i class="fas fa-trash"></i></a>

                                </td>
                            </tr>
                            <?php
                                $no++;
                                }
                            ?>
                        </tbody>
                    </table>
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

        function del(id){
            if(confirm("Yakin ingin menghapus ?") == true) {
                window.location.href="couponProses.php?id="+id+"&key=delete";
            }
        }
    </script>

</body>
</html>