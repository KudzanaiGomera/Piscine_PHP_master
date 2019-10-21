<?php

class Person {
    // properties
    public $name;
    public $eyeColor;
    public $age;

    //constructor
    public function __construct($name,$eyeColor,$age){
        $this->name = $name;
        $this->eyeColor =$eyeColor;
        $this->age = $age;
    }


    //methods
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    //destructor

    public function __destruct(){

    }

}
?>