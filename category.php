<div class="sidebar col-md-3 col-3" id="sidebar" >
    <div class="card bg-dark">
        <div class="card-body text-white">
            <div class="d-flex justify-content-between">
                <h6 class="mt-2">Category</h6>
                <!-- <button class="btn btn-dark" id="sidebar-btn" onclick="sidebarToggle()"><i class="fas fa-bars"></i></button> -->
            </div>    
            <hr class="bg-light mb-5">
            <ul class="container ml-3" style="list-style: none;">
                <li class="my-4">
                    <a href="<?=$base_url;?>/product.php" class="<?php if($activeCategory=="new_arrival")echo 'bg-secondary p-1';?> text-white">New Arrival </a>
                </li>
                <li class="my-4">
                    <a href="<?=$base_url;?>/category/index.php?category=populer" class="<?php if($activeCategory=="populer")echo 'bg-secondary p-1';?> text-white">Populer</a>
                </li>
                <li class="my-4">
                    <a href="<?=$base_url;?>/category/index.php?category=hot_sale" class="<?php if($activeCategory=="hot_sale")echo 'bg-secondary p-1';?> text-white">Hot Sale <i class="fas fa-fire"></i></a>
                </li>
                <li class="my-4">
                    <a href="#" data-toggle="collapse" data-target="#menu1" aria-expanded="false" aria-controls="menu1" class="text-white <?php if(substr($activeCategory,0,3)=="man")echo 'bg-secondary p-1';?>">Man</a>
                        <div id="menu1" class="collapse ml-3 my-3" data-parent="accordion">
                            <ul>
                                <li class="my-2">
                                    <a href="<?=$base_url;?>/category/index.php?category=man_batik" class="text-white mt-4 <?php if($activeCategory=="man_batik")echo 'bg-secondary p-1';?>">Batik</a>
                                </li>
                                <li class="my-2">
                                    <a href="<?=$base_url;?>/category/index.php?category=man_jaket" class="text-white my-4 <?php if($activeCategory=="man_jaket")echo 'bg-secondary p-1';?>">Jaket</a>
                                </li>
                                <li class="my-2">
                                    <a href="<?=$base_url;?>/category/index.php?category=man_kemeja" class="text-white my-4 <?php if($activeCategory=="man_kemeja")echo 'bg-secondary p-1';?>">Kemeja</a>
                                </li>
                                <li class="my-2">
                                    <a href="<?=$base_url;?>/category/index.php?category=man_kaos" class="text-white my-4 <?php if($activeCategory=="man_kaos")echo 'bg-secondary p-1';?>">Kaos</a>
                                </li>
                            </ul>
                        </div>
                </li>
                <li class="my-4">
                    <a href="#" data-toggle="collapse" data-target="#menu2" aria-controls="menu2" class="text-white expand <?php if(substr($activeCategory,0,5)=="woman")echo 'bg-secondary p-1';?>">Woman</a>
                        <div id="menu2" class="collapse ml-3 my-3" data-parent="accordion">
                        <ul>
                                <li class="my-2">
                                    <a href="<?=$base_url;?>/category/index.php?category=woman_batik" class="text-white mt-4 <?php if($activeCategory=="woman_batik")echo 'bg-secondary p-1';?>">Batik</a>
                                </li>
                                <li class="my-2">
                                    <a href="<?=$base_url;?>/category/index.php?category=woman_kemeja" class="text-white my-4 <?php if($activeCategory=="woman_kemeja")echo 'bg-secondary p-1';?>">Kemeja</a>
                                </li>
                                <li class="my-2">
                                    <a href="<?=$base_url;?>/category/index.php?category=woman_kaos" class="text-white my-4 <?php if($activeCategory=="woman_kaos")echo 'bg-secondary p-1';?>">Kaos</a>
                                </li>
                                <li class="my-2">
                                    <a href="<?=$base_url;?>/category/index.php?category=woman_luaran" class="text-white my-4 <?php if($activeCategory=="woman_luaran")echo 'bg-secondary p-1';?>">Luaran</a>
                                </li>
                            </ul>
                        </div>
                </li>
                <li class="my-4">
                    <a href="#" data-toggle="collapse" data-target="#menu3" aria-expanded="false" aria-controls="menu3" class="text-white <?php if(substr($activeCategory,0,4)=="kids")echo 'bg-secondary p-1';?>">Kids</a>
                        <div id="menu3" class="collapse ml-3 my-3" data-parent="accordion">
                            <ul>
                                <li class="my-2">
                                    <a href="<?=$base_url;?>/category/index.php?category=kids_boy" class="text-white mt-4 <?php if($activeCategory=="kids_boy")echo 'bg-secondary p-1';?>">Boy</a>
                                </li>         
                                <li class="my-2">
                                    <a href="<?=$base_url;?>/category/index.php?category=kids_girl" class="text-white my-4 <?php if($activeCategory=="kids_girl")echo 'bg-secondary p-1';?>">Girl</a>
                                </li>
                            </ul>
                        </div>
                </li>
            </ul>
            
        </div>
    </div>
</div>