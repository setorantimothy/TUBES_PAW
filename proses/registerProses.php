<?php
    include ('../config.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/OAuth.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/POP3.php';
    require '../PHPMailer/src/SMTP.php';
    
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
            $query = mysqli_query($con,$sql)or die($sql);
            
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
                        Please verif your email before access to our website
                        you can click this link to verif your email : 
                        '.$linkVerif.'
                    </body>
                    </html>';
            $header = "From : no-reply@".$_SERVER['SERVER_NAME'];
            //$sendmail = mail($email,$subject,$msg,$header);
            
            //Create a new PHPMailer instance
            $mail = new PHPMailer;
    
            //Tell PHPMailer to use SMTP
            //$mail->isSMTP();
    
            //Enable SMTP debugging
            // SMTP::DEBUG_OFF = off (for production use)
            // SMTP::DEBUG_CLIENT = client messages
            // SMTP::DEBUG_SERVER = client and server messages
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    
            //Set the hostname of the mail server
            //$mail->Host = 'smtp.gmail.com';
            // use
            // $mail->Host = gethostbyname('smtp.gmail.com');
            // if your network does not support SMTP over IPv6
    
            //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
            //$mail->Port = 587;
    
            //Set the encryption mechanism to use - STARTTLS or SMTPS
            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    
            //Whether to use SMTP authentication
            //$mail->SMTPAuth = true;
    
            //Username to use for SMTP authentication - use full email address for gmail
            //$mail->Username = 'setorantimothy6@gmail.com';
    
            //Password to use for SMTP authentication
            //$mail->Password = 'password';
    
            //Set who the message is to be sent from
            $mail->setFrom('no-reply@brandname.com', 'Brand Name service');
    
            //Set an alternative reply-to address
            //$mail->addReplyTo('replyto@example.com', 'First Last');
    
            //Set who the message is to be sent to
            $mail->addAddress($email, $nama);
    
            //Set the subject line
            $mail->Subject = 'Verification Account - Brand Name';
    
            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            
            $mail->Body = $msg;
            //Replace the plain text body with one created manually
            $mail->AltBody = 'Verification Account';
            
            if($mail->send()) {
                echo '<script>
                    alert("Register Success \nPlease check your inbox \nto verify your email.");window.location = "../login.php"
                </script>';
            } else {
                $_SESSION['status'] = "FAILED";
                $_SESSION['message'] = "Failed sending verification email";
                //header("location: ".$base_url.'/register.php');
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