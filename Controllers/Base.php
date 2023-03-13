<?php

include './../Models/Database.php';
include './../Models/DBInteract.php';

//include_once './../config/config.php';
//include_once './../config/init.php';

class Base{
    public function __construct(){
        $echo = "I'm the constructor for Base controller<br>";
    }
}

    $base = new Base();
    $db = new Database();

    $request_url=( $_SERVER["HTTP_REFERER"]);
    //echo "Request source from ". $request_url. "<br>";
    //echo "Request basename    ". basename($request_url). "<br>";

    if (basename($request_url) == "listing.php"){
        $products = $db->productList();
        //print("<pre>".print_r($products,true)."</pre>");
        echo  ($products);
    }elseif (basename($request_url) == "add.php"){
        if (empty($_POST)) {
            echo "Post values are empty";
        } else {
            print("<pre>".print_r($_POST,true)."</pre>");
            $p_sku = $_POST['product_info']['product_sku'];
            $p_name = $_POST['product_info']['product_name'];
            $p_price = $_POST['product_info']['product_price'];
            $p_cat = $_POST['product_info']['product_type'];
            $insert = $db->productInsert($p_sku, $p_name, $p_price, $p_cat);

            echo ($insert) ? "Inserted Product" : "Unable to insert product";
        }

        $products = $db->productList();

        print("<pre>".print_r($products,true)."</pre>");
    }