<div class="sidebar bg-dark w-100" id="sidebar">
    <div class="pt-4 text-white d-flex justify-content-between">
        <h3 class="ml-3">Menu</h3>
        <button class="btn btn-dark mr-2" onclick="sidebarToggle()"><i class="fas fa-list"></i></button>
    </div>
    <div class="container mt-5 bg-default">
        <ul class="sidebar-menu">
            <a href="<?=$base_url;?>/admin/" role="button"><li><i class="fa fa-tachometer"></i> &nbsp;Dashboard</li></a>
            <a href="<?=$base_url;?>/admin/orders.php" role="button"><li><i class="fas fa-shopping-bag"></i> &nbsp;Orders</li></a>
            <a href="<?=$base_url;?>/admin/payments.php" role="button"><li><i class="fas fa-credit-card"></i> &nbsp;Payment Confirmation</li></a>
            <a href="<?=$base_url;?>/admin/products.php" role="button"><li><i class="fas fa-cubes"></i> &nbsp;Products</li></a>
        </ul>
    </div>
</div>