<?php
    include '../config.php';
    if(isset($_GET['key'])) {
        $key = $_GET['key'];
        $sql = "SELECT * FROM email_verification WHERE verif_key ='$key' && status=0";
        $query = mysqli_query($con,$sql);
        $n = mysqli_num_rows($query);
        if($n==0) {
            echo 
                '<script>
                    alert("This Email already verified");window.location = "../login.php "
                </script>';
        }else {
            $re = mysqli_fetch_assoc($query);
    
            $id = $re['id'];
            $user_id = $re['user_id'];
            $date = date('y-m-d');
            $n = mysqli_num_rows($query);
            if($n > 0) {
                $sql = "UPDATE email_verification set status=1,verified_date='$date' where id = $id";
                $query = mysqli_query($con,$sql);
                $sql = "UPDATE users set is_verified = 1 where id='$user_id'";
                $query = mysqli_query($con,$sql);
    
                echo 
                    '<script>
                        alert("Verification Success");window.location = "../login.php "
                    </script>';
            } else {
                echo 
                    '<script>
                        alert("Verification Failed \nincorrect key or already verified");window.location = "../register.php "
                    </script>';
            }
        }
    } else {
        echo '<script>
            alert("Verification Failed \nincorrect key or missing something");window.location = "../register.php "
        </script>';
    }
?>