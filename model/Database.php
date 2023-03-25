<?php

include_once './../config/config.php';

class Database{

    private $connection;

    private $sku ; //Product attributes
    private $name;
    private $price ;
    private $category ;
    private $attrib;
    private $sku_delete;
    private $products;

    public function getSku()
    {
        return $this->sku;
    }

    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getAttrib()
    {
        return $this->attrib;
    }

    public function setAttrib($attrib)
    {
        $this->attrib = $attrib;
    }

    public function getSkuDelete()
    {
        return $this->sku_del;
    }

    public function setSkuDelete($sku_del)
    {
        $this->sku_del = $sku_del;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function setProducts($products)
    {
        $this->products = $products;
    }

    /*
     * Initialize the database connection within the class constructor
     */
    public function __construct()
    {
        try{
            $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
            if ( mysqli_connect_errno()) {
                $err = mysqli_connect_error();
                return "Could not connect to database -> ".$err;
            }

        } catch (Exception $e){
            $err = $e->getMessage();
            return "Error in connection ".$err;
        }
    }

    /*
     * Function to fetch all products from the database
     */
    public function productList()
    {
        $sql = "SELECT * FROM tbl_Products ORDER BY prod_count DESC";
        $result = mysqli_query($this->connection , $sql);
        if($result){
            $prods = mysqli_fetch_all($result);

            $product_ui = '';

            foreach ($prods as $single_product){
                $this->setSku($single_product[1]);
                $this->setName($single_product[2]);
                $this->setPrice($single_product[3]);
                $this->setCategory($single_product[4]);
                $this->setAttrib($single_product[5]);

                $prod_prefix = ($this->getCategory()=="DVD" ? "DVD" : ($this->getCategory()=="Book" ? "Weight" : ($this->getCategory()=="Furniture" ? "Dimensions" : "")) );

                $product_ui .= '
                <div class="col-md-3 col-sm-6">
                    <div class="card mb-3 rounded-3">
                        <div class="card-body">
                            <div class="form-check checkbox-class">
                                <input class="form-check-input delete-checkbox" type="checkbox" name="checkbox-delete" value="'.$single_product[1].'">
                            </div>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li><i class="fas fa-tag text-muted"></i>&nbsp;&nbsp;'.$this->getSku().'</li>
                                <li class="fs-4">'.$this->getName().'</li>
                                <li>'.$this->getPrice().'&nbsp;<i class="fas fa-dollar-sign text-muted"></i></li>
                                <li class="fw-bold">'.$prod_prefix.':&nbsp;&nbsp;'.$this->getAttrib().'</li>
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

    /*
     * Add a new product to the database.
     */
    public function productInsert()
    {
        $str_sku        = filter_var($this->getSku(), FILTER_SANITIZE_STRING);
        $str_name       = filter_var($this->getName(), FILTER_SANITIZE_STRING);
        $str_price      = filter_var($this->getPrice(), FILTER_SANITIZE_STRING);
        $str_category   = filter_var($this->getCategory(), FILTER_SANITIZE_STRING);
        $str_attrib     = filter_var($this->getAttrib(), FILTER_SANITIZE_STRING);

        $str_values     = " '".$str_sku."', '".$str_name."', '".$str_price."', '".$str_category."', '".$str_attrib."' ";

        $sql            = "INSERT INTO tbl_Products (prod_sku, prod_name, prod_price, prod_category, product_attrib) VALUES (".$str_values.")";

        $result         = mysqli_query($this->connection , $sql);
        if($result){
            return true;
        } else{
            return false;
        }
    }

    /*
     * Delete a product from the database.
     */
    public function productDelete()
    {
        $multiple_skus = $this->getSkuDelete();
        foreach ($multiple_skus as $product_sku){
            $str_sku    = filter_var($product_sku, FILTER_SANITIZE_STRING);
            $sql        = "DELETE FROM tbl_Products WHERE prod_sku = '".$str_sku."' ";
            $result     = mysqli_query($this->connection , $sql);
        }
    }

    /*
     * Function to check if SKU typed exists in the product_list table.
     */
    public function checkSku()
    {
        $str_sku        = filter_var($this->getSku(), FILTER_SANITIZE_STRING);
        $str_values     = " '".$str_sku."' ";

        $sql            = "SELECT * FROM tbl_Products WHERE prod_sku = ".$str_values." ";
        $result         = mysqli_query($this->connection , $sql);

        if ($result->num_rows > 0) {
            return false;
        } else {
            return true;
        }
    }
}

    $db = new Database();