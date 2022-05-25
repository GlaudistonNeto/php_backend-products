<?php

namespace core\classes;

use Exception;

class Functions{

    // ===========================================================
    public static function Layout($structures, $data = null){

        // verifica se estruturas é um array
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

}
