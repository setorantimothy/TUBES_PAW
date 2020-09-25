<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <?php
            if(isset($_SESSION['isLogin']) && $_SESSION['user']['is_admin'] && (strpos($_SERVER['PHP_SELF'],'admin'))) 
                echo'<button class="btn btn-dark mr-2" onclick="sidebarToggle()"><i class="fas fa-list"></i></button>';
        ?>
        <a class="navbar-brand" href="<?=$base_url;?>"><strong> BRAND NAME</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav ml-auto">
                <form action="<?=$base_url;?>/product.php" method="get">
                    <input type="search" name="q" class="form-control" placeholder="search something..." style="background-color:whitesmoke;width:300px">
                </form>
            </div>
                    
            <ul class="navbar-nav ml-auto d-flex flex-row">        
                <li class="nav-item mx-auto">
                    <a class="nav-link" href="<?=$base_url;?>/cart.php"><i class="fas fa-shopping-cart"></i>
                        <?php
                            if($cartCount > 0 )
                                echo '<span class="badge badge-pill badge-danger">'.$cartCount.'</span>';
                        ?>
                    </a>
                </li>
                
                <?php
                    
                    if(isset($_SESSION['isLogin'])){
                        echo '
                        <li class="nav-item dropdown mx-auto">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" >
                                '.$_SESSION['user']['name'].'
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="'.$base_url.'/myOrder.php">Order</a>
                                <a class="dropdown-item" href="'.$base_url.'/myAccount.php">Account</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="'.$base_url.'/logout.php">Logout</a>
                            </div>
                        </li>
                        ';
                        if($_SESSION['user']['is_admin']){
                            echo '<li class="nav-item mx-auto">
                                    <a class="nav-link" href="'.$base_url.'/admin/">Admin Menu</a>
                                </li>';
                        }
                        
                    } else {
                        echo '<li class="nav-item mx-auto">
                        <a class="nav-link" href="'.$base_url.'/login.php">Login</a>
                    </li>
                    <li class="nav-item mx-auto">
                        <a class="nav-link" href="'.$base_url.'/register.php">Register</a>
                    </li>';
                    }
                ?>   
            </ul>
        </div>
    </div>  
</nav>