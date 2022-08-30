<?php

    //Static Properties
    //Static properties can be called directly - without creating an instance of a class    

    //Static properties are declared with the static keyword
    
    class ClassName {
        public static $staticProp = "Vitor";
    }

    //To access a static property use the class name, double colon (::), and the property name:
    ClassName::$staticProp;


    //we declare a static property: $value. Then, we echo the value of the static property by using 
    //the class name, double colon (::), and the property name (without creating a class first).
    class pi {
        public static $value = 3.14159;

        public function staticValue() {
            return self::$value;
        }
    }
      
    // Get static property
    echo pi::$value;

    //A class can have both static and non-static properties. A static property can be accessed from a method in 
    //the same class using the self keyword and double colon (::)
    $pi = new pi();
    echo $pi->staticValue();

?>