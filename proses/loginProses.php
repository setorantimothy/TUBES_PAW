<?php
    include ('../config.php');

    if(isset($_POST['btn'])){
       $email = $_POST['email'];
        $password = $_POST['password'];
        $query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'") or die(mysqli_error($con));

        if(mysqli_num_rows($query) == 0){
            echo 
                '<script>
                    alert("Email not found"); window.location = "../login.php"
                </script>';
        } else {
            $user = mysqli_fetch_assoc($query);
            if(password_verify($password,$user['password'])){
                if($user['is_verified'] == 0) {
                    echo '<script>
                        alert("Verif your email first."); window.location = "../login.php"
                    </script>';
                } else {
                    session_start();
                    $_SESSION['isLogin'] = true; 
                    $_SESSION['user'] = $user;
                    header("location: ".$base_url);
                }
            } else {
                echo 
                '<script>
                    alert("Password incorrect"); window.location = "../login.php"
                </script>';
            }
            
        }
    }else {
        header("location: ".$base_url);
    }
    

?>