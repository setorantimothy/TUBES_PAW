<?php
    include 'config.php';
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
    <section class="container mt-4 d-flex justify-content-center" id="main">
       <div class="col-md-5 my-4">
            <?php 
                if(isset($_SESSION['status']) && $_SESSION['status']=="FAILED")
                    echo '<div class="alert alert-danger text-center">'.$_SESSION['message'].'</div>';
                    //init message , when refresh message doesnt show
                    $_SESSION['message']= null;
                    $_SESSION['status']= null;
            ?>
           <div class="card rounded shadow">
               <div class="card-header text-white bg-info"><h5>Register</h5></div>
               <div class="card-body">
                    <form action="<?=$base_url;?>/proses/registerProses.php" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" required class="form-control" id="name" name="name" placeholder="your name">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" required minlength="11" maxlength="15" class="form-control" id="phone_number" name="phone_number" placeholder="6287721230725">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" required class="form-control" id="email" name="email" placeholder="your email">
                        </div>
                        <label for="password">Password</label>
                        <div class="input-group mb-3">
                            <input type="password" required class="form-control" id="password" name="password" placeholder="your password">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-eye" onclick="showPassword()"></i></span>
                            </div>
                        </div>
                        
                        <button class="btn btn-block w-60 btn-info mb-1" type="submit" name="btn">Sign Up</button>
                        <span>Already have account ? <a href="<?=$base_url;?>/login.php">login</a></span>

                    </form>

               </div>
           </div>
       </div>
    </section>
    <script src="assets/js/script.js"></script>
</body>
</html>