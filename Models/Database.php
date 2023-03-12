<?php

include_once './../config/config.php';
//include_once './../config/init.php';

class Database{

    public $connection = null;

    public function __construct(){
        try {
            $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
            if ( mysqli_connect_errno()) {
                echo "Could not connect to database.<br>";
            }else{
                echo "Connected to database<br>";
            }

        } catch (Exception $e) {
            $err = $e->getMessage();
            echo "Error in connection ".$err.".<br>";
        }

        return $this->connection;
    }
}

    $db = new Database();