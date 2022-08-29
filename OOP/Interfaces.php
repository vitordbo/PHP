<?php

    // What are Interfaces?
    // Interfaces allow you to specify what methods a class should implement.

    // Interfaces make it easy to use a variety of different classes in the same way.
    // When one or more classes use the same interface, it is referred to as "polymorphism".

    // Interfaces are declared with the interface keyword:

    interface InterfaceName {
        public function someMethod1();
        public function someMethod2($name, $color);
        public function someMethod3() : string;
    }

        
    // Interface are similar to abstract classes. The difference between interfaces and abstract classes are:

    // Interfaces cannot have properties, while abstract classes can
    // All interface methods must be public, while abstract class methods is public or protected
    // All methods in an interface are abstract, so they cannot be implemented in code and the abstract keyword is not necessary
    // Classes can implement an interface while inheriting from another class at the same time

    // To implement an interface, a class must use the implements keyword.

    // A class that implements an interface must implement all of the interface's methods.

    interface Animal {
        public function makeSound();
    }
      
    class Cat implements Animal {
        public function makeSound() {
          echo "Meow <br>";
        }
    }

    class Dog implements Animal {
        public function makeSound() {
          echo "Bark <br>";
        }
    }
      
    $animal = new Cat();
    $animal->makeSound();

    $dog = new Dog();
    $dog->makeSound();

    //Cat and Dog are all classes that implement the Animal interface, 
    //which means that all of them are able to make a sound using the makeSound() method. 
    //Because of this, we can loop through all of the animals and tell them to make a sound even if we 
    //don't know what type of animal each one is.
    
    //Since the interface does not tell the classes how to implement the method, 
    //each animal can make a sound in its own way.
    

?>