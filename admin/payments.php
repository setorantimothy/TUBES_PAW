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
    
    <title>Payment Confirmation Admin Page - BRAND NAME</title>
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
                    <?php
                        if(isset($_SESSION['status'])){
                            echo '<div class="alert alert-'.$_SESSION['status'].'">'.$_SESSION['message'].'</div>';
                            $_SESSION['status']= null;
                            $_SESSION['message']= null;
                        }
                    ?>
                    <h2>Payment Confirmation : </h2><hr>
                    <table class="table table-reponsive table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No Order</th>
                                <th>Date</th>
                                <th>Transfer To</th>
                                <th>From</th>
                                <th>Receipt</th>
                                <th>Action</th>
                            </tr>
                        </thead>    
                        <tbody>
                            <?php
                                $sql = "select cp.*,o.id as 'order_id' from confirm_payment cp
                                JOIN orders o
                                ON o.no_order = cp.no_order where o.status=1 ORDER BY order_id DESC";
                                $query = mysqli_query($con,$sql);
                                while($re = mysqli_fetch_assoc($query)){
                                    $no_order = $re['no_order'];
                                    $id = $re['order_id'];
                                    $date = date_create($re['date']);
                                    $now = date_create(date('y-m-d H:i:s'));
                                    $date_diff = date_diff($date,$now)->format('%r%h hour %i minute ago');
                                    $transfer_to = $re['transfer_to'];
                                    $transfer_from = $re['transfer_from'];
                                    $image = $re['image'];
                                ?>
                            <tr>
                                <td>#<?=$no_order;?></td>
                                <td><small> <?=$date_diff;?></small></td>
                                <td><?=$transfer_to;?></td>
                                <td><?=$transfer_from;?></td>
                                <td><a href="<?=$base_url;?>/assets/receipt/<?=$image;?>" target="_blank">view</a></td>
                                <td>
                                    <a class="btn btn-dark btn-sm mb-1 mr-1" href="orderProses.php?id=<?=$id;?>"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-primary btn-sm mb-1 mr-1" href="paymentConfirmProses.php?id=<?=$id;?>&status=2"><i class="fas fa-check-circle"></i></a>
                                    <a class="btn btn-danger btn-sm mb-1 mr-1" href="paymentConfirmProses.php?id=<?=$id;?>&status=0"><i class="fas fa-trash"></i></a>

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