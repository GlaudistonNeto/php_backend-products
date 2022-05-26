<?php 
use core\classes\Store;
?>
<div class="container-fluid navegacao">
    <div class="row">
        <div class="col-6 p-3">
            <a href="?a=home">
                <h3><?= APP_NAME ?></h3>
            </a>
        </div>
        <div class="col-6 text-end p-3">

            <a href="?a=home">Home</a>
            <a href="?a=store">Store</a>

            <!-- verifica se existe cliente na sessao -->
            <?php if(Store::clienteLogado()):?>
                
                <a href="">My account</a>
                <a href="">Logout</a>                

            <?php else:?>
                
                <a href="">Login</a>
                <a href="">Create account</a>

            <?php endif;?>

            <a href="?a=cart"><i class="fas fa-shopping-cart"></i></a>

            <span class="badge bg-warning"></span>
        </div>
    </div>
</div>