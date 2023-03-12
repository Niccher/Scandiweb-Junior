<?php

include './../Models/Database.php';
include './../Models/DBInteract.php';

//include_once './../config/config.php';
//include_once './../config/init.php';

class Base{
    public function __construct(){
        echo "I'm the constructor for Base controller<br>";
    }

    public function testEcho(){
        return "This is from function testEcho<br>";
    }
}

    $base = new Base();
    echo $base->testEcho();

    $dbi = new DBInteract();
    echo $dbi->productList();

    if (empty($_POST)) {
        echo "Post values are empty";
    } else {
        print("<pre>".print_r($_POST,true)."</pre>");
    }