<?php

include './../model/Database.php';

class Home{

    public static $conn;

    public function __construct()
    {
        self::$conn = new Database();
    }

    public static function getDB()
    {
        return self::$conn;
    }
}

    $home = new Home();


abstract class Products{
    abstract public function get();
}

class FetchProducts extends Products
{
    public function get()
    {
        $instanceDb = "";
        $this->instanceDb = Home::getDB();
        $products = $this->instanceDb->productList();
        $this->instanceDb->setProducts($products);
        echo  ($products);
    }
}

class DeleteProducts extends Products
{
    public function get()
    {
        $instanceDb = "";
        $instanceDb = Home::getDB();
        $instanceDb->productDelete();
    }
}

class AddProducts extends Products
{
    public function get()
    {
        $instanceDb = "";
        $this->instanceDb = Home::getDB();
        $this->instanceDb->productInsert();
    }
}

class CheckSku extends Products
{
    public function get()
    {
        $instanceDb = "";
        $this->instanceDb = Home::getDB();
        echo $this->instanceDb->checkSku() ? "Valid" : "Invalid";
    }
}

    $request_url = $_SERVER["HTTP_REFERER"];

    $fetchProducts  = new FetchProducts();
    $deleteProducts = new DeleteProducts();
    $addProducts    = new AddProducts();
    $checkSku       = new CheckSku();

    if (basename($request_url) == "index.php" || strcmp( basename($request_url), URL_ENDPOINT )){
        if($_POST['action'] == 'get_products'){
            $fetchProducts->get();
        }

        if($_POST['action'] == 'del_products'){
            $product_ids = $_POST['prod_ids'];

            if (count($product_ids) > 0){
                foreach ($product_ids as $product_sku){
                    $home->getDB()->setSkuDelete($product_ids);
                    $deleteProducts->get();
                }
            }
        }
    }

    if (basename($request_url) == "add-product"){
        if (isset($_POST['action'])){
            if($_POST['action'] == 'sku_valid'){
                $sku = $_POST['product_sku'];
                $home->getDB()->setSku($_POST['product_sku']);
                $checkSku->get();
            }

        }else{
            if (!empty($_POST)) {
                $home->getDB()->setSku($_POST['product_info']['product_sku']);
                $home->getDB()->setName($_POST['product_info']['product_name']);
                $home->getDB()->setPrice($_POST['product_info']['product_price']);
                $home->getDB()->setCategory($_POST['product_info']['product_type']);
                $home->getDB()->setAttrib($_POST['product_info']['product_attrib']);

                $addProducts->get();
            }
        }
    }