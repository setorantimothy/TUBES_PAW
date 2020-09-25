<?php
    require_once 'cekAdmin.php';
    $user_id = $_SESSION['user']['id'];

    if(isset($_GET['id']) && isset($_GET['key'])) {
        $id = $_GET['id'];
        $key = $_GET['key'];

        if($key == "delete") {
            $sql = "delete from product where id=$id";
            $query = mysqli_query($con,$sql);
            if($query) {
                echo '<script>
                        alert("Success delete product"); window.location = "products.php"
                    </script>';
            }
        }else {
            header("location: ".$base_url.'/admin/products.php');
        }
    } else if(isset($_POST['key'])) {
        $key = $_POST['key'];
        if($key == "Add"){
            $folder = '../assets/img/';
            $name = $_POST['name'];
            $desc = $_POST['description'];
            $images = $_FILES['images'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $stocks = $_POST['stocks'];
            $countfiles = count($images['name']);

            $img = "";

            for($i=0 ; $i < $countfiles; $i++){
                $imgname = rand().'-'.date('y-m-d').basename($_FILES['images']['name'][$i]);
                $img = $img.$imgname;
                if($i < $countfiles - 1){
                    $img = $img.",";    
                }
                $destination = $folder.$imgname;
                move_uploaded_file($_FILES['images']['tmp_name'][$i],$destination);
            }

            $sql = "INSERT INTO product(name,description,image,category_id,price,stocks)values('$name','$desc','$img',$category,$price,$stocks)";
            $query = mysqli_query($con,$sql);
            if($query){
                echo '
                        <script>
                            alert("Success add product"); window.location = "products.php"
                        </script>
                ';
            } else {
                die("ERROR : ".$sql);
            }
        }else if($key == "Update"){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $desc = $_POST['description'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $stocks = $_POST['stocks'];

            $sql = "UPDATE product set name='$name',description='$desc',category_id='$category',price=$price,stocks=$stocks where id = $id";
            $query = mysqli_query($con,$sql);
            if($query){
                echo '
                        <script>
                            alert("Success edit product"); window.location = "products.php"
                        </script>
                ';
            } else {
                die("ERROR : ".$sql);
            }
        }
    }

?>

