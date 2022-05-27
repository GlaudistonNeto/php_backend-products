<?php

namespace core\classes;

use Exception;

class Store{

    // ===========================================================
    public static function Layout($structures, $data = null){

        // check if structures is an array
        if(!is_array($structures)){
            throw new Exception("Invalid structure collection");
        }

        // variables
        if(!empty($data) && is_array($data)){
            extract($data);
        }

        // display application views
        foreach($structures as $structure){
            include("../core/views/$structure.php");
        }

    }

    // ===========================================================
    public static function isProduct(){

        // check if there is a product in the store
        return isset($_SESSION['product']);
    }

}