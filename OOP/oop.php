<?php 

    //Object-Oriented programming is faster and easier to execute.
    //Object-oriented programming is about creating objects that contain both data and functions.

    //OOP is faster and easier to execute
    // OOP provides a clear structure for the programs
    // OOP helps to keep the PHP code DRY "Don't Repeat Yourself", and makes the code easier to maintain, modify and debug
    // OOP makes it possible to create full reusable applications with less code and shorter development time

    /*
        class Fruit {
            // code goes here...
        }
    */

    //A class is a template for objects, and an object is an instance of class.
    //Let's assume we have a class named Fruit. A Fruit can have properties like name, color, weight, etc. We can define variables like $name, $color, and $weight to hold the values of these properties.

    //When the individual objects (apple, banana, etc.) are created, they inherit all the properties 
    //and behaviors from the class, but each object will have different values for the properties.

    //A class is defined by using the class keyword, followed by the name of the class and a pair of curly braces ({}).
    //All its properties and methods go inside the braces:
    class Fruit {
        // Properties
        public $name;
        public $color;
      
        // Methods
        function set_name($name) {
          $this->name = $name;
        }
        function get_name() {
          return $this->name;
        }
    }

    // Objects
    // Classes are nothing without objects! We can create multiple objects from a class. Each object has all the properties and methods defined in the class, but they will have different property values.
    // Objects of a class is created using the new keyword.

    $apple = new Fruit();
    $obj2 = new Fruit();

    $apple->set_name('Apple');
    $obj2->set_name('Banana');

    echo $apple->get_name();
    echo "<br>";
    echo $obj2->get_name();
    echo "<br>";

    echo var_dump($apple);
    echo "<br>";
    echo var_dump($obj2);

    //PHP - The $this Keyword
    //The $this keyword refers to the current object, and is only available inside methods.
    // function set_name($name) {
    //    $this->name = $name;
    //}

?>