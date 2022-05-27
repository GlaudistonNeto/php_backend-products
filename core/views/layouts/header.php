<?php 
use core\classes\Store;
?>
<div class="container-fluid navegacao">
    <div class="row">
        <div class="col-6 p-3">
            <a href="?a=inicio">
                <h3><?= APP_NAME ?></h3>
            </a>
        </div>
        <div class="col-6 text-end p-3">

            <a href="?a=inicio">Início</a>
            <a href="?a=loja">Loja</a>

            <!-- check if there is a product in the store -->
            <?php if(Store::isProduct()):?>
                
                <a href="">Add product & Price</a>              

            <?php else:?>
                
                <a href="">Add product</a>
                <a href="">Change price</a>

            <?php endif;?>

            <a href="?a=carrinho"><i class="fas fa-shopping-cart"></i></a>

            <span class="badge bg-warning"></span>
        </div>
    </div>
</div>