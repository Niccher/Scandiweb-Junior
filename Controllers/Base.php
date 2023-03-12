<?php

class Base{
    public function __construct(){
        echo "Im the constructor for DB";
    }

    public function testEcho(){
        return "this is from function testEcho";
    }
}

    $base = new Base();
    echo $base->testEcho();

    if (empty($_POST)) {
        echo "Post values are empty";
    } else {
        print("<pre>".print_r($_POST,true)."</pre>");
    }