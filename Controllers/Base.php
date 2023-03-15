<?php

include './../Models/Database.php';

    $request_url=( $_SERVER["HTTP_REFERER"]);

    if (basename($request_url) == "index.php" || basename($request_url) == ""){
        if($_POST['action'] == 'get_products'){
            $products = $db->productList();
            $db->setProducts($products);
            echo  ($products);
        }
        if($_POST['action'] == 'del_products'){
            $product_ids = $_POST['prod_ids'];

            if (count($product_ids) > 0){
                $db->setSkuDelete($product_ids);
                $db->productDelete();
            }
        }
    }elseif (basename($request_url) == "addproduct.php"){
        if (!empty($_POST)) {
            $db->setSku($_POST['product_info']['product_sku']);
            $db->setName($_POST['product_info']['product_name']);
            $db->setPrice($_POST['product_info']['product_price']);
            $db->setCategory($_POST['product_info']['product_type']);
            $db->setAttrib($_POST['product_info']['product_attrib']);

            $insert = $db->productInsert();
        }

        $products = $db->productList();
    }