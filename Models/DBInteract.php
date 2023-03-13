<?php

include "./Database.php";

class DBInteract extends Database {

    public function productView(){
        $sql = "SELECT * FROM `persons` ";
        $result = mysqli_query($connection , $sql);
        if($result){
            echo "records Fetched.";
        } else{
            echo "Could not execute $sql. " . mysqli_error($connection);
        }

        echo ("Data types as ". gettype($connection));

        echo "Could productList";
    }

    public function productInsert(){

    }
}