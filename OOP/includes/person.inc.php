<?php

class Person {
    // properties
    public $name;
    public $eyeColor;
    public $age;

    //static variables

    public static $drinkingAge = 21;

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

    public function getDA(){
        return self::$drinkingAge; // references to this class same as this but in static we use self
        
    }

    //destructor

    public function __destruct(){

    }

    //static method and apparently we can access them without creating and object
    public static function setDrinkingAge($newDA){

        self::$drinkingAge = $newDA;
    }

}
?>