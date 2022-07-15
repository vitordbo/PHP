<?php
    /*
    PHP supports the following data types:

    String
    Integer
    Float (double)
    Boolean
    Array
    Object
    NULL
    */

    // String
    //A string is a sequence of characters, like "Hello world!".
    //You can use single or double quotes:
    $html = "<h1>Test h1</h1>";
    $x = "Hello world!";
    $y = 'A simple text!';

    echo $html;
    echo "<br>";
    echo $x;
    echo "<br>";
    echo $y;
    echo "<br>";

    // Integer
    //An integer data type is a non-decimal number between -2,147,483,648 and 2,147,483,647.
    //An integer must not have a decimal point
    //An integer can be either positive or negative
    echo "<br>----------Integer-----------<br>";
    
    //$z is an integer. The PHP var_dump() function returns the data type and value:
    $z = 5985;
    $w = 15;
    var_dump($z);
    echo "<br>";
    echo $z + $w;

    // Float
    //floating point number is a number with a decimal point
    echo "<br>----------Float-----------<br>";

    //In the following example $float is a float. PHP var_dump() function returns the data type and value:
    $float = 10.365;
    var_dump($x);
    echo "<br>";

    // Boolean
    echo "<br>----------Booleans-----------<br>";
    // represents two possible states: TRUE or FALSE.
    // booleans are often used in conditional testing.

    $bool1 = true;
    $bool2 = false;

    var_dump($bool1);
    echo "<br>";
    var_dump($bool2);
    echo "<br>";

    //Array
    //An array stores multiple values in one single variable.
    echo "<br>----------Array-----------<br>";
  
    // $cars is an array
    $cars = array("Audi","BMW","Toyota");
    var_dump($cars);
    echo "<br>";

    //Object 
    echo "<br>----------Object-----------<br>";
    //A class is a template for objects, and an object is an instance of a class.
    //each object will have different values for the properties.
    //Let's assume we have a class named Car. A Car can have properties like model, color, etc. We can define variables like $model, $color...
    //If you create a __construct() function, PHP will automatically call this function when you create an object from a class.
        
    class Car {
        public $color;
        public $model;

        public function __construct($color, $model) {
          $this->color = $color;
          $this->model = $model;
        }

        public function message() {
          return "My car is a " . $this->color . " " . $this->model . "!";
        }
    }
      
    $myCar1 = new Car("white", "Audi");
    echo $myCar1 -> message();
    echo "<br>";
    $myCar2 = new Car("gray", "Toyota");
    echo $myCar2 -> message();
    echo "<br>";

    

    //PHP NULL Value
    echo "<br>----------NULL-----------<br>";
    //Null is a special data type which can have only one value: NULL.
    //A variable of data type NULL is a variable that has no value assigned to it.
    //If a variable is created without a value, it is automatically assigned a value of NULL.

    $test = "Hello world!";
    $test = null;
    var_dump($test);

?>