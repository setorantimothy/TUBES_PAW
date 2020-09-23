<?php
    include ('../config.php');

    if(isset($_POST['btn'])){
        $name = $_POST['name'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(name,email,password,phone_number) VALUES('$name','$email','$password','$phone_number')";
        $query = mysqli_query($con,$sql);

        if($query){
            echo 
                '<script>
                    alert("Register Success \nPlease check your inbox \nto verify your email."); window.location = "../login.php"
                </script>';
        } else {
            '<script>
                    alert("Something was wrong !"); window.location = "../register.php"
                </script>';
        }
    }else {
        header("location: ".$base_url);
    }

?>