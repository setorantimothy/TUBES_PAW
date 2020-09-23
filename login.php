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
           <div class="card rounded shadow ">
               <div class="card-header text-white bg-dark"><h5>Login</h5></div>
               <div class="card-body">
                    <form action="<?=$base_url;?>/proses/loginProses.php" method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" required class="form-control" id="email" name="email" placeholder="your email">
                        </div>
                        <label for="password">Password</label>
                        <div class="input-group mb-3">
                            <input type="password" required class="form-control" id="repass" name="repass" placeholder="your password">
                            <div class="input-group-append" onclick="showPassword()">
                                <span class="input-group-text"><i class="fas fa-eye-slash" ></i></span>
                            </div>
                        </div>
                        
                        <button class="btn btn-block w-60 btn-dark mb-1">Sign Up</button>
                        <span>Doesn't have account ? <a href="<?=$base_url;?>/register.php">register</a></span>

                    </form>

               </div>
           </div>
       </div>
    </section>
    <script src="assets/js/script.js"></script>
</body>
</html>