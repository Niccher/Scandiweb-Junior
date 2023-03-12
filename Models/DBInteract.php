<?php

include "./Database.php";

class DBInteract extends Database {

    public function productList(){
        $sql = "SELECT * FROM SampleTable";
        if(mysqli_query($connection , $sql)){
            echo "No record Fetched.";
        } else{
            echo "Could execute $sql. " . mysqli_error($connection);
        }
    }

    public function productInsert(){

    }
}