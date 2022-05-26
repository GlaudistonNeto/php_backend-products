<?php

namespace core\controllers;

<<<<<<< HEAD
use core\classes\Store;
=======
use core\classes\Functions;
>>>>>>> 9d367a531177c500512c5f8f6995b031a4cddc09

class Main{

    // ===========================================================
    public function index(){

<<<<<<< HEAD
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'home',
            'layouts/footer',
            'layouts/html_footer',
        ]);
=======
        $data = [
            'title' => 'This is the title',
            'clients' => ['client_one', 'client_two', 'client_three']
        ];

        Functions::Layout([
            'layouts/html_header',
            'home_page',
            'layouts/html_footer',
        ], $data);
>>>>>>> 9d367a531177c500512c5f8f6995b031a4cddc09

    }

    // ===========================================================
    public function store(){
<<<<<<< HEAD
        
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
=======
        echo 'Store!!!!!!';
>>>>>>> 9d367a531177c500512c5f8f6995b031a4cddc09
    }

}