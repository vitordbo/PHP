<?php

    //Inheritance =>
    //Inheritance in OOP = When a class derives from another class.

    //The child class will inherit all the public and protected properties and methods from the parent class. In addition, it can have its own properties and methods.

    //An inherited class is defined by using the extends keyword.

    class Fruit {
        public $name;
        public $color;

        public function __construct($name, $color) {
            $this->name = $name;
            $this->color = $color;
        }

        // we could also use public, protected and private in methods 
        public function intro() {
            echo "The fruit is {$this->name} and the color is {$this->color}.";
        }
    }

    // Strawberry is inherited from Fruit
    // This means that the Strawberry class can use the public $name and $color properties 
    //as well as the public __construct() and intro() methods from the Fruit class because of inheritance.

    // The Strawberry class also has its own method: message().
    class Strawberry extends Fruit {

        public function message() {
            echo "Am I a fruit or a berry? ";
        }
    }

    $strawberry = new Strawberry("Strawberry", "red");
    $strawberry->message();
    $strawberry->intro();

?>