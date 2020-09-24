<?php
    include ('../config.php');

    if(isset($_POST['btn'])){
        $name = $_POST['name'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        $geo = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
        if($geo['geoplugin_status'] == 200)
            $address = $geo['geoplugin_city'].' '.$geo['geoplugin_region'].' '.$geo['geoplugin_areaCode'].' '.$geo['geoplugin_countryName'].'<br>latitude'.$geo['geoplugin_latitude'].' &nbsp; longtitude:'.$geo['geoplugin_longitude'];
        else 
            $address=NULL;
    
        $sql = "SELECT name from users where email='$email'";
        $query = mysqli_query($con,$sql);
        $n = mysqli_num_rows($query);
        
        if($n==0) {
            $sql = "INSERT INTO users(name,email,password,phone_number,address) VALUES('$name','$email','$password','$phone_number','$address')";
            $query = mysqli_query($con,$sql);
            
            $sql = "SELECT * FROM users where email = '$email'";
            $query = mysqli_query($con,$sql);
            $re = mysqli_fetch_assoc($query);
            $verif_key = md5($email.time());
            $id = $re['id'];
            
            $sql = "INSERT INTO email_verification(user_id,verif_key)values($id,'$verif_key')";
            $query = mysqli_query($con,$sql);
    
            $linkVerif = $base_url.'/proses/verifEmail.php?key='.$verif_key;
            $subject = "Verification Email - BRAND NAME";
            $msg = '<html>
                    <body>
                        Hi, '.$name.' <br><br>
                        Please verif your email before access to our websiteyou can click this link to verif your email : 
                        '.$linkVerif.'
                    </body>
                    </html>';
            $header = 'From : no-reply@'.$base_url;
            mail($email,$subject,$msg,$header);
            if($query){
            echo '<script>
                    alert("Register Success \nPlease check your inbox \nto verify your email.");window.location = "../login.php "
                </script>';
            } else {
                header("location: ".$base_url.'/register.php');
            }
            
        } else {
            echo $sql;
            
            $_SESSION['status'] = "FAILED";
            $_SESSION['message'] = "Email already registered";
            header("location: ".$base_url.'/register.php');
        }
        
        
    }else {
        header("location: ".$base_url);
    }

?>