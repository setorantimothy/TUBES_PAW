<?php
    include '../cekLogin.php';
    if(isset($_POST['btn'])) {
        $user_id = $_SESSION['user']['id'];
        $folder = '../assets/receipt/';
        $file_name = $user_id.'-'.date('y-m-d').basename($_FILES['receipt']['name']);
        $destination = $folder.$file_name;
        $no_order = $_POST['no_order'];
        $transfer_to = $_POST['transfer_to'];
        $transfer_from = $_POST['transfer_from'];
        $date  = date('Y-m-d h:i:s');
        
        $sql = "INSERT INTO confirm_payment(no_order,date,transfer_to,transfer_from,image)values($no_order,'$date','$transfer_to','$transfer_from','$file_name')";
        $query = mysqli_query($con,$sql) or die("ERROR".$sql);
        if($query) {
            move_uploaded_file($_FILES['receipt']['tmp_name'],$destination);
            echo '<script>
                    alert("Please wait for confirmation");window.location = "../myOrder.php "
                </script>';
        } else {
            echo '<script>
                    alert("Something was wrong");window.location = "../myOrder.php "
                </script>';
        }
    } else {
        header("location: ".$base_url.'/myOrder.php');
    }
?>