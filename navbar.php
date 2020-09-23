<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?=$base_url;?>"><strong> BRAND NAME</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav ml-auto">
            <div class="input-group input-group-sm">
                    <input type="search" class="form-control" placeholder="search something..." style="background-color:whitesmoke;width:300px">
                    <div class="input-group-append">
                        <span class="input-group-text bg-dark"><i class="fas fa-search text-white"></i></span>
                    </div>
                </div>  
            </div>
                    
            <ul class="navbar-nav ml-auto d-flex flex-row">        
                <li class="nav-item mx-auto">
                    <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i>
                        <?php
                            if($cartCount > 0 )
                                echo '<span class="badge badge-pill badge-danger">'.$cekCart.'</span>';
                        ?>
                    </a>
                </li>
                <?php
                    if(isset($_SESSION['user'])){
                        echo '
                        <li class="nav-item dropdown mx-auto">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" >
                                '.$_SESSION['user'].'
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Order</a>
                                <a class="dropdown-item" href="#">Account</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Logout</a>
                            </div>
                        </li>
                        ';
                    } else {
                        echo '<li class="nav-item mx-auto">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                    <li class="nav-item mx-auto">
                        <a class="nav-link" href="#">Register</a>
                    </li>';
                    }
                ?>   
            </ul>
        </div>
    </div>  
</nav>