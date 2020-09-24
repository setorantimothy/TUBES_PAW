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
    
    <title>Orders Admin Page - BRAND NAME</title>
</head>
<body>
    <!-- NAVBAR  -->
    <?php
        include '../navbar.php';
    ?>

    <!-- CONTENT -->
    <section id="main">
        <div class="row col-md-12">
            <div>
                <?php
                    include 'sidebar.php';
                ?>
            </div>
            <div class="col" id="content">
                <div class="mt-4">
                    <h2>Orders : </h2><hr>
                    <table class="table table-reponsive table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No Order</th>
                                <th>Date</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Grandtotal</th>
                                <th>Discount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>    
                        <tbody>
                            <?php
                                $sql = "select o.id as 'order_id' ,o.*,u.* from orders o join users u
                                ON o.user_id = u.id ORDER BY o.id DESC";
                                $query = mysqli_query($con,$sql);
                                while($re = mysqli_fetch_assoc($query)){
                                    $no_order = $re['no_order'];
                                    $date = $re['order_date'];
                                    $grandtotal = $re['grandtotal'];
                                    $discount = $re['discount'];
                                    $address = $re['address'];
                                    $status = $re['status'];
                                    $email = $re['email'];
                                    $id = $re['order_id']
                                ?>
                            <tr>
                                <td>#<?=$no_order;?></td>
                                <td><?=$date;?></td>
                                <td><?=$email;?></td>
                                <td><?=$address;?></td>
                                <td><?=$grandtotal;?></td>
                                <td><?=$discount;?></td>
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
                                            case 0:
                                                echo '<span class="badge badge-danger">Canceled</span>';
                                                break;
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a class="btn btn-dark btn-sm mb-1 mr-1" href="orderProses.php?id=<?=$id;?>"><i class="fas fa-list-alt"></i> Detail</a>
                                    <a class="btn btn-success btn-sm mb-1 mr-1" href="orderProses.php?id=<?=$id;?>&status=3"><i class="fas fa-check-circle"></i> Complete</a>
                                    <a class="btn btn-primary btn-sm mb-1 mr-1" href="orderProses.php?id=<?=$id;?>&status=2"><i class="fas fa-hourglass-half"></i> Proses</a>
                                    <a class="btn btn-danger btn-sm mb-1 mr-1" href="orderProses.php?id=<?=$id;?>&status=0"><i class="fas fa-times"></i> Cancel</a>

                                </td>
                            </tr>
                            <?php
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
    </script>
</body>
</html>