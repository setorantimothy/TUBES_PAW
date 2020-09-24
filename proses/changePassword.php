<?php
    include '../cekLogin.php';
    if(isset($_POST['oldpass'])){
        $oldpass = $_POST['oldpass'];
        if(password_verify($oldpass,$_SESSION['user']['password'])){
            $newpass = $_POST['newpass'];
            $repass = $_POST['repass'];
            $password = password_hash($newpass, PASSWORD_DEFAULT);
            $id = $_SESSION['user']['id'];
            if($repass == $newpass) {
                $sql = "UPDATE USERS SET password = '$password' where id = '$id'";
                $query = mysqli_query($con,$sql);
                $_SESSION['status'] = "success";
                $_SESSION['msg'] = "Success Change Password";
            } else {
                $_SESSION['status'] = "danger";
                $_SESSION['msg'] = "New password doesn't match";
            }

        } else {
            $_SESSION['status'] = "danger";
            $_SESSION['msg'] = "old password doesn't match";
        }
    }
    header('location: '.$base_url.'/myAccount.php');

?>