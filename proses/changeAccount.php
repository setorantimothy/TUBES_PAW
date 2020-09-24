<?php
    include '../cekLogin.php';
    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $name = $_POST['name'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];

        $sql = "UPDATE users SET name='$name',phone_number ='$phone_number' ,address='$address' where email = '$email'";
        $query = mysqli_query($con,$sql);
        $_SESSION['status'] = "success";
        $_SESSION['msg'] = "Success Change Account Settings";
        $_SESSION['user']['address'] = $address;
        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['phone_number'] = $phone_number;
    }
    header('location: '.$base_url.'/myAccount.php');

?>