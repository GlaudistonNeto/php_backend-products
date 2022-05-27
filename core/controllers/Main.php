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
        
        // apresenta a página da store

        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'store',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }

    // ===========================================================
    public function addProd(){
        
        // display the addProd page

        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'addProd',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }

}