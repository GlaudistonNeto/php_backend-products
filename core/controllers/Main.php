<?php

namespace core\controllers;

use core\classes\Store;

class Main{

    // ===========================================================
    public function index(){

        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'home',
            'layouts/footer',
            'layouts/html_footer',
        ]);

    }

    // ===========================================================
    public function store(){
        
        // dhow the store page

        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'store',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }

    // ===========================================================
    public function carrinho(){
        
        // show cart page

        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'cart',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }

}