<?php
    require_once 'cekAdmin.php';
    $user_id = $_SESSION['user']['id'];

    if(isset($_GET['id']) && isset($_GET['status'])) {
        $id = $_GET['id'];
        $status = $_GET['status'];
        $sql = "UPDATE orders set status=$status where id=$id";
        $query = mysqli_query($con,$sql);
        if($query) {
            if($status==2){
                $_SESSION['status'] = "success";
                $_SESSION['message'] = "Success Confirm Payment";
            }else {
                $_SESSION['status'] = "danger";
                $_SESSION['message'] = "Success Reject Orders";
            }
           

            header("location: ".$base_url.'/admin/payments.php');
        }

    }else {
        header("location: ".$base_url.'/admin/');
    }

?>

