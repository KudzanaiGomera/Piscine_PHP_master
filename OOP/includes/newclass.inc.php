<?php

class NewClass {
    //properties and methods goes here
    public $data= "l am a property";

    public function __construct(){
        echo "this class has been instantiated <br>";
    }

    public function setNewProperty($newdata){
        $this->data = $newdata;
    }

    public function getProperty($newdata){
        $this->data = $newdata;
    }

    public function __destruct(){
        echo "<br> this is the end of the class!";
    }
} 

//instantiating

$object = new NewClass;
var_dump($object);

?>