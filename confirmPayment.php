<?php
    require_once 'cekLogin.php';
    $user_id = $_SESSION['user']['id'];
    if(!isset($_GET['no_order'])){
        header("location:".$base_url.'/myOrder.php');
    } else {
        $noOrder = $_GET['no_order'];
        $sql = "select * from orders where no_order=$noOrder AND user_id = $user_id";
        $query = mysqli_query($con,$sql);
        $n = mysqli_num_rows($query);
        if($n < 1) {
            header("location:".$base_url.'/myOrder.php');
        }
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
    <section class="container mt-5 d-flex justify-content-center" id="main" >
        <div class="card bg-dark col-md-5 text-white">
            <div class="card-body">
                <h4>Payment Confirmation</h4>
                <hr class="bg-light">
                <form action="<?=$base_url;?>/proses/prosesCofirmPayment.php" method="post" enctype="multipart/form-data" class="my-4">
                    <div class="form-group">
                        <label for="noOrder">No Order : </label>
                        <input type="text" required class="form-control" name="no_order" readonly required value="<?=$_GET['no_order'];?>">
                    </div>
                    <div class="form-group">
                        <label for="transfer_to">Transfer to : </label>
                        <select name="transfer_to" required class="form-control">
                            <option value="BANK CENTRAL ASIA">BANK CENTRAL ASIA | 123-456-789</option>
                            <option value="BANK RAKYAT INDONESIA">BANK RAKYAT INDONESIA | 987-654-321</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="transfer_from">Transfer from : </label>
                        <input type="text" required name="transfer_from" class="form-control" placeholder="YOUR NAME - ACCOUNT NUMBER">
                    </div>
                    <div class="form-group">
                        <label for="transfer_from">Recipt: </label>
                        <input type="file" required name="receipt" class="form-control" accept="image/*">
                    </div>
                    <div class="form-group mt-5">
                        <button type="submit" name="btn" class="btn btn-primary">Submit <i class="fas fa-paper-plane"></i> </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="assets/js/script.js"></script>
</body>
</html>