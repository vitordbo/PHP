<?php

    //The __construct Function
    //A constructor allows you to initialize an object's properties upon creation of the object.
    // If you create a __construct() function, PHP will automatically call this function when you 
    //create an object from a class.

    // Notice that the construct function starts with two underscores (__)!

    // that using a constructor saves us from calling the set_name() method which reduces the amount of code:

    class Car {
        public $name;
        public $color;
      
        function __construct($name) {
          $this->name = $name;
        }
        function get_name() {
          return $this->name;
        }
    }
      
    $car1 = new Car("Toyota");
    echo $car1->get_name();

    echo "<br>";

    $car2 = new Car("BMW");
    echo $car2->get_name();
    echo "<br>";


    // destruct Function
    // A destructor is called when the object is destructed or the script is stopped or exited.
    // If you create a __destruct() function, PHP will automatically call this function at the end of the script.

    // destruct function starts with two underscores (__)!

    // The example below has a __construct() function that is automatically called when you create an object 
    //from a class, and a __destruct() function that is automatically called at the end of the script:

    class Phone {
        public $name;
        public $color;
      
        function __construct($name) {
          $this->name = $name;
        }
        function __destruct()
        {
            echo "$this->name";
        }
    }
      
    $phone1 = new Phone("Iphone");

?>