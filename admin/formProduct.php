<?php
    require_once 'cekAdmin.php';
    $user_id = $_SESSION['user']['id'];

    if(!isset($_GET['key'])){
        header("location: ".$base_url.'/admin');
    }else if($_GET['key']=="Add" || $_GET['key']=="Update"){
        $key = $_GET['key'];
        if($key == "Update"){
            $id = $_GET['id'];
            $sql = "select * from product where id=$id";
            $query = mysqli_query($con,$sql);
            $n =mysqli_num_rows($query);
            if($n < 1){
                header("location: products.php");
            }else {
                $re = mysqli_fetch_assoc($query);
                $name = $re['name'];
                $price = $re['price'];
                $stocks = $re['stocks'];
                $category = $re['category_id'];
                $description = $re['description'];
                $image = $re['image'];
            }
        }
    }else {
        header("location: ".$base_url.'/admin/products.php');
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
    
    <title>Products Admin Page - BRAND NAME</title>
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
                            <div class="card-header bg-info text-white"><?=$key;?> Product</div>
                            <div class="card-body">
                                <form action="<?=$base_url;?>/admin/productProses.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" required class="form-control" value="<?php if(isset($name) && $name!="" && $key=="Update") echo $name; ?>" name="name" placeholder="product name">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group mr-2">
                                            <label for="Price">Price</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="number" required class="form-control" value="<?php if(isset($price) && $price!="" && $key=="Update") echo $price; ?>" name="price" placeholder="50.000">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="stocks">Stocks</label>
                                            <div class="input-group mb-3">
                                                <input type="number" required class="form-control"  name="stocks" placeholder="23" value="<?php if(isset($stocks) && $stocks!="" && $key=="Update") echo $stocks; ?>">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">pcs</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select class="form-control" required name="category">
                                            <option value="" selected >-- Choose one --</option>
                                            <?php
                                                $sql = "SELECT id,name FROM CATEGORY where parent_id is null order by name ASC";
                                                $query = mysqli_query($con,$sql);
                                                while($re = mysqli_fetch_assoc($query)){
                                                    $pid = $re['id'];
                                                    $pname = $re['name'];
                                                        if($pid!=NULL){
                                                            $sql2 = "SELECT id,name from category where parent_id='$pid' order by name ASC";
                                                            $query2 = mysqli_query($con,$sql2);
                                                                if(isset($category) && $category!="" && $key=="Update" && $category==$pid){
                                                                    echo '
                                                                    <option selected value="'.$pid.'"><--'.$pname.'--></option>';
                                                                }
                                                                else {
                                                                    echo '
                                                                    <option value="'.$pid.'"><--'.$pname.'--></option>';
                                                                }
                                                        }
                                                        

                                                        while($rec = mysqli_fetch_assoc($query2)){
                                                            $cid = $rec['id'];
                                                            $name = $rec['name'];
                                                            if(isset($category) && $category!="" && $key=="Update" && $category==$cid){
                                                                echo '
                                                                <option selected value="'.$cid.'">'.$name.'</option>';
                                                            }
                                                            else {
                                                                echo '
                                                                <option value="'.$cid.'">'.$name.'</option>';
                                                            }
                                                        }
                                                    
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" required class="form-control" placeholder="desc product"><?php if(isset($description) && $description!="" && $key=="Update") echo $description; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Images</label>
                                        <input type="file"<?php if($key=="Update") echo 'readonly'; ?> name="images[]" multiple accept="image/*" required class="form-control">
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