<?php

namespace core\controllers;

use core\classes\Functions;

class Main{

    // ===========================================================
    public function index(){

        $data = [
            'title' => 'This is the title',
            'clients' => ['client_one', 'client_two', 'client_three']
        ];

        Functions::Layout([
            'layouts/html_header',
            'home_page',
            'layouts/html_footer',
        ], $data);

    }

    // ===========================================================
    public function store(){
        echo 'Store!!!!!!';
    }

}