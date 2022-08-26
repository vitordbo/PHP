<?php

    //Abstract classes and methods are when the parent class has a named method, but need its child class(es) to fill out the tasks.
    //An abstract class is a class that contains at least one abstract method. 
    //An abstract method is a method that is declared, but not implemented in the code.
    
    //defined with the abstract keyword

    abstract class ImportedCar {
        abstract function test();
    }

    // The child class method must be defined with the same name and it redeclares the parent abstract method
    // The child class method must be defined with the same or a less restricted access modifier
    // The number of required arguments must be the same. However, the child class may 
    //have optional arguments in addition
    
    // class to extends Car
    class BMW extends ImportedCar {
        function test(){ // same from ImportedCar
            echo "I'm a method<br>";
        }
    }

    $car1 = new BMW();
    $car1->test();

?>