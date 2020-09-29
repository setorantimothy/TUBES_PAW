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
                <div class="mt-4 container">
                    <h2>Products : </h2><hr>
                    <div class="d-flex justify-content-between mb-4">
                        <a href="<?=$base_url;?>/admin/formProduct.php?key=Add" class="btn btn-success mb-2 btn-sm"><i class="fas fa-plus"></i> Product</a href="<?=$base_url;?>/admin/formProduct.php">
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
                                <th>Price</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Stocks</th>
                                <th>Action</th>
                            </tr>
                        </thead>    
                        <tbody>
                            <?php
                                $sql = "select p.*,c.name as 'category' from product p 
                                        join category c 
                                        on p.category_id = c.id";
                                if(isset($_GET['q'])){
                                    $q = $_GET['q'];
                                    $sql = $sql." where p.name like '%$q%' or p.description like '%$q%' or c.name like '%$q%'";
                                }
                                $query = mysqli_query($con,$sql);
                                $no = 1;
                                while($re = mysqli_fetch_assoc($query)){
                                    $no = $no++;
                                    $id = $re['id'];
                                    $name = $re['name'];
                                    $description = $re['description'];
                                    $image = $re['image'];
                                    $category = $re['category'];
                                    $stocks = $re['stocks'];
                                    $price = $re['price']
                                ?>
                            <tr>
                                <td>#<?=$no;?></td>
                                <td><?=$name;?></td>
                                <td><?=$description;?></td>
                                <td><?=number_format($price);?></td>
                                <td><a href="#" onclick="showGalery('<?=$name;?>','<?=$image;?>')" >Show <i class="fas fa-images"></i></a></td>
                                <td><?=$category;?></td>
                                <td><?=$stocks;?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm mb-1 mr-1" href="<?=$base_url;?>/admin/formProduct.php?key=Update&id=<?=$id;?>"><i class="fas fa-edit"></i></a>
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
                window.location.href="productProses.php?id="+id+"&key=delete";
            }
        }
        function showGalery(param1,param2){
            var i;
            $("#modalTitle").text(param1);

            let indicator = $("#carousel-indicators");
            let img = $("#carousel-image");
            var images = param2.split(",");
            var url = window.location.origin+'/paw/tubes/assets/img/';
            img.html('<div class="carousel-item active"><img class="d-block w-100" src="'+url+images[0]+'" alt="First slide"></div>');
            indicator.html('<li data-target="#galeryModal" data-slide-to="0" class="active"></li>')
            for(i=1; i < images.length ; i ++){
                img.append('<div class="carousel-item"><img class="d-block img-fluid slider-product" src="'+url+images[i]+'" alt="First slide"></div>');
                indicator.append('<li data-target="#galeryModal" data-slide-to="'+i+'"></li>');
            }
            if(images.length < 2) {
                $("#carousel-control").addClass('d-none');
            }
            $("#galeryModal").modal('show');            
        }
    </script>

<div class="modal fade modal-md" id="galeryModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalBody">
                <div id="galeryModalIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators" id="carousel-indicators">
                        
                    </ol>
                    <div class="carousel-inner" id="carousel-image">
                        
                    </div>
                    <div id="carousel-control">
                        <a class="carousel-control-prev bg-dark" href="#galeryModalIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next bg-dark" href="#galeryModalIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
</body>
</html>