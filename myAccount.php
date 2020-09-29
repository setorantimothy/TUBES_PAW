<?php
    require_once 'cekLogin.php';
    $user_id = $_SESSION['user']['id'];
    
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
    <title>ACCOUNT - BRAND NAME</title>
</head>
<body>
    <!-- NAVBAR  -->
    <?php
        include 'navbar.php';
    ?>

    <!-- CONTENT -->
    <section class="container mt-5" id="main" >
    <?php
        if(isset($_SESSION['status'])) {
            echo '<div class="alert text-center alert-'.$_SESSION['status'].'">'.$_SESSION['msg'].'</div>';
            $_SESSION['status'] = null;
            $_SESSION['msg'] = null;
        }
    ?>
    
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <form action="<?=$base_url;?>/proses/changeAccount.php" method="post">
                        <h4 class="text-center">Account Settings <hr> </h4>
                        <div class="row ml-3 mt-5 mb-2">
                            <div class="col-md-5">
                                <p>Email </p>
                            </div>
                            <div class="col-md-6">
                                <input type="email" readonly required name="email" class="form-control" value="<?=$_SESSION['user']['email'];?>">
                            </div>
                        </div>
                        <div class="row ml-3 mb-2">
                            <div class="col-md-5">
                                <label>Nama </label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" required value="<?=$_SESSION['user']['name'];?>">
                            </div>
                        </div>
                        <div class="row ml-3 mb-2">
                            <div class="col-md-5">
                                <label>Phone Number </label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="phone_number" minlength="11" maxlength="15" required class="form-control" value="<?=$_SESSION['user']['phone_number'];?>">
                            </div>
                        </div>
                        <div class="row ml-3 mb-2">
                            <div class="col-md-5">
                                <label>Address</label>
                            </div>
                            <div class="col-md-6">
                                <textarea name="address" required class="form-control"><?=$_SESSION['user']['address'];?></textarea>
                            </div>
                        </div>
                        <div class="row ml-4 mt-4">
                            <div class="col-md-5"></div>
                            <div class="col-md-6 text-right">
                                <button class="text-center btn btn-primary">Save</button>
                            </div>    
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <form action="<?=$base_url;?>/proses/changePassword.php" method="post">
                        <h4 class="text-center">Change Password<hr> </h4>
                        <div class="row ml-3 mt-5 mb-2">
                            <div class="col-md-5">
                                <p>Old Password </p>
                            </div>
                            <div class="col-md-6">
                                <input type="password"  required name="oldpass" class="pass form-control">
                            </div>
                        </div>
                        <div class="row ml-3 mb-2">
                            <div class="col-md-5">
                                <label>New password </label>
                            </div>
                            <div class="col-md-6">
                                <input type="password" required name="newpass" class="pass form-control" required >
                            </div>
                        </div>
                        <div class="row ml-3 mb-2">
                            <div class="col-md-5">
                                <label>Re-type new password </label>
                            </div>
                            <div class="col-md-6">
                                <input type="password" required name="repass" required class="pass form-control">
                            </div>
                        </div>
                        
                        <div class="row ml-4 mt-4">
                            
                            <div class="col-md-11 text-right">
                                <button class="text-center btn btn-dark">Ubah Password</button>
                            </div>    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
        
    </section>
    <script src="assets/js/script.js"></script>
</body>
</html>