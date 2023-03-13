<?php

include_once './../config/config.php';
//include_once './../config/init.php';

class Database{

    public $connection = null;

    public function __construct(){
        try {
            $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
            if ( mysqli_connect_errno()) {
                $err = mysqli_connect_error();
                echo "Could not connect to database -> $err.<br>";
            }else{
                //echo "Connected to database<br>";
            }

        } catch (Exception $e) {
            $err = $e->getMessage();
            echo "Error in connection ".$err.".<br>";
        }
    }

    public function productList(){
        $sql = "SELECT * FROM tbl_Products ORDER BY prod_count DESC";
        $result = mysqli_query($this->connection , $sql);
        if($result){
            $prods = mysqli_fetch_all($result);

            $product_ui = '';

            foreach ($prods as $single_product){
                $product_ui .= '
                <div class="col-md-3 col-sm-6">
                            <div class="card mb-3 rounded-3">
                                <div class="card-body">
                                    <div class="form-check checkbox-class">
                                        <input class="form-check-input delete-checkbox" type="checkbox" name="checkbox-delete[]">
                                    </div>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li>'.$single_product[1].'</li>
                                        <li>'.$single_product[2].'</li>
                                        <li>'.$single_product[3].'</li>
                                        <li>'.$single_product[4].'</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                ';
            }
            return $product_ui;
        } else{
            return false;
        }
    }

    public function productInsert($prod_sku, $prod_name, $prod_price, $prod_category){
        $sql = "INSERT INTO tbl_Products (prod_sku, prod_name, prod_price, prod_category) VALUES ('".$prod_sku."', '".$prod_name."', '".$prod_price."', '".$prod_category."')";
        $result = mysqli_query($this->connection , $sql);
        if($result){
            return true;
        } else{
            return false;
        }
    }
}

    $db = new Database();