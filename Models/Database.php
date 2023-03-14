<?php

include_once './../config/config.php';

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
                $prod_icon = "";
                $prod_prefix = "";
                if($single_product[4] ==  "DVD"){
                    $prod_icon = "<i class='fas fa-compact-disc text-muted'></i>";
                    $prod_prefix = "Disk Size";
                }else if($single_product[4] ==  "Book"){
                    $prod_icon = "<i class='fas fa-book text-muted'></i>";
                    $prod_prefix = "Weight";
                }else if($single_product[4] ==  "Furniture"){
                    $prod_icon = "<i class='fas fa-chair text-muted'></i>";
                    $prod_prefix = "Dimensions";
                }
                $prods_category = '<li class="fw-bold">'.$prod_icon.'&nbsp;&nbsp;'.$single_product[4].'</li>';

                $product_ui .= '
                <div class="col-md-3 col-sm-6">
                    <div class="card mb-3 rounded-3">
                        <div class="card-body">
                            <div class="form-check checkbox-class">
                                <input class="form-check-input delete-checkbox" type="checkbox" name="checkbox-delete" value="'.$single_product[1].'">
                            </div>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li><i class="fas fa-tag text-muted"></i>&nbsp;&nbsp;'.$single_product[1].'</li>
                                <li class="fs-4"><i class="fas fa-tags text-muted"></i>&nbsp;&nbsp;'.$single_product[2].'</li>
                                <li>'.$single_product[3].'&nbsp;<i class="fas fa-dollar-sign text-muted"></i></li>
                                <li class="fw-bold">'.$prod_prefix.':&nbsp;&nbsp;'.$single_product[5].'</li>
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

    public function productInsert($prod_sku, $prod_name, $prod_price, $prod_category, $prod_attrib){

        $str_sku = filter_var($prod_sku, FILTER_SANITIZE_STRING);
        $str_name = filter_var($prod_name, FILTER_SANITIZE_STRING);
        $str_price = filter_var($prod_price, FILTER_SANITIZE_STRING);
        $str_category = filter_var($prod_category, FILTER_SANITIZE_STRING);
        $str_attrib = filter_var($prod_attrib, FILTER_SANITIZE_STRING);

        $str_values = " '".$str_sku."', '".$str_name."', '".$str_price."', '".$str_category."', '".$str_attrib."' ";

        $sql = "INSERT INTO tbl_Products (prod_sku, prod_name, prod_price, prod_category, product_attrib) VALUES (".$str_values.")";

        $result = mysqli_query($this->connection , $sql);
        if($result){
            return true;
        } else{
            return false;
        }
    }

    public function productDelete($multiple_skus){
        foreach ($multiple_skus as $product_sku){
            $str_sku = filter_var($product_sku, FILTER_SANITIZE_STRING);
            $sql = "DELETE FROM tbl_Products WHERE prod_sku = '".$str_sku."' ";
            $result = mysqli_query($this->connection , $sql);
        }
    }
}

    $db = new Database();