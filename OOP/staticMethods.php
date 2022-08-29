<?php

    //Static methods can be called directly - without creating an instance of the class first.

    //Static methods are declared with the static keyword:

    class ClassName {
        public static function staticMethod() {
          echo "Hello World!";
        }
    }

    //to access a static method use the class name, double colon (::), and the method name:
    ClassName::staticMethod();

    class greeting {
        public static function welcome() {
          echo "Hello World!";
        }
    }

    //Here, we declare a static method: welcome(). Then, we call the static method by using the class name, 
    // double colon (::), and the method name (without creating an instance of the class first).

    // Call static method
    greeting::welcome();


?>