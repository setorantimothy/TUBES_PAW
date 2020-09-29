<?php
    require_once 'cekAdmin.php';
    $user_id = $_SESSION['user']['id'];

    if(isset($_GET['id']) && isset($_GET['key'])) {
        $id = $_GET['id'];
        $key = $_GET['key'];

        if($key == "delete") {
            $sql = "delete from coupon where id=$id";
            $query = mysqli_query($con,$sql);
            if($query) {
                echo '<script>
                        alert("Success delete coupon"); window.location = "coupons.php"
                    </script>';
            }
        }else {
            header("location: ".$base_url.'/admin/coupons.php');
        }
    } else if(isset($_POST['key'])) {
        $key = $_POST['key'];
        if($key == "Add"){
            $name = $_POST['name'];
            $disc = $_POST['disc'];

            $sql = "INSERT INTO coupon(name,disc)values('$name',$disc)";
            $query = mysqli_query($con,$sql);
            if($query){
                echo '
                        <script>
                            alert("Success add coupon"); window.location = "coupons.php"
                        </script>
                ';
            } else {
                die("ERROR : ".$sql);
            }
        }else if($key == "Update"){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $disc = $_POST['disc'];

            $sql = "UPDATE coupon set name='$name',disc=$disc where id = $id";
            $query = mysqli_query($con,$sql);
            if($query){
                echo '
                        <script>
                            alert("Success edit coupon"); window.location = "coupons.php"
                        </script>
                ';
            } else {
                die("ERROR : ".$sql);
            }
        }
    }

?>

