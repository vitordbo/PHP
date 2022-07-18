<?php

    //PHP Operators are used to perform operations on variables and values.
    // Very close to Javascript operators

    // in PHP we have:

    // Arithmetic operators
    // Assignment operators
    // Comparison operators
    // Increment/Decrement operators
    // Logical operators
    // String operators
    // Array operators
    // Conditional assignment operators

    $x = 10;
    $y = 5;

    //Arithmetic Operators are used with numeric values to perform common arithmetical operations, 
    //such as addition, subtraction, multiplication etc.

    // +	Addition	    $x + $y	
    // -	Subtraction	    $x - $y	
    // *	Multiplication	$x * $y	
    // /	Division	    $x / $y		
    // %	Modulus	        $x % $y	
    // **	Exponentiation	$x ** $y 

    echo "-----Arithmetic Operators-----<br>";
    echo $x + $y; 
    echo "<br>";
    echo $x / $y; 
    echo "<br>";


    echo "<br>-----Assignment Operators-----<br>";
    // PHP Assignment Operators are used with numeric values to write a value to a variable.
    // The basic assignment operator in PHP is "=". It means that the left operand gets set to the value of the assignment expression on the right.

    // x = y	x = y	The left operand gets set to the value of the expression on the right	
    // x += y	x = x + y	Addition	
    // x -= y	x = x - y	Subtraction	
    // x *= y	x = x * y	Multiplication	
    // x /= y	x = x / y	Division	
    // x %= y	x = x % y	Modulus

    $z = 50;
    $x *= $y; 
    echo $x; // 50
    echo "<br>";
    echo $z += $x; // 50 + 50
    echo "<br>";


    echo "<br>-----Comparison Operators-----<br>";
    // PHP Comparison Operators are used to compare two values (number or string):

    // ==	Equal	        $x == $y	Returns true if $x is equal to $y	
    // ===	Identical	    $x === $y	Returns true if $x is equal to $y, and they are of the same type	
    // !=	Not equal	    $x != $y	Returns true if $x is not equal to $y	
    // <>	Not equal	    $x <> $y	Returns true if $x is not equal to $y	
    // !==	Not identical	$x !== $y	Returns true if $x is not equal to $y, or they are not of the same type	
    // >	Greater than	$x > $y	Returns true if $x is greater than $y	
    // <	Less than	    $x < $y	Returns true if $x is less than $y	
    // >=	Greater than or equal to	$x >= $y	Returns true if $x is greater than or equal to $y	
    // <=	Less than or equal to   $x <= $y	Returns true if $x is less than or equal to $y	
    // <=>	Spaceship	$x <=> $y	Returns an integer less than, equal to, or greater than zero, depending on if $x is less than, equal to, or greater than $y. Introduced in PHP 7.

    echo var_dump($x === $y); // false
    echo "<br>";
    echo var_dump($y < $z); // true 
    echo "<br>"; 


    echo "<br>-----Increment / Decrement Operators-----<br>";
    // PHP Increment / Decrement Operators are used to increment or decrement a variable's value.

    // ++$x	Pre-increment	Increments $x by one, then returns $x	
    // $x++	Post-increment	Returns $x, then increments $x by one	
    // --$x	Pre-decrement	Decrements $x by one, then returns $x	
    // $x--	Post-decrement	Returns $x, then decrements $x by one

    echo ++$x; // 51
    echo "<br>"; 
    $z--; // 100 -1
    echo $z; // 99
    echo "<br>";


    echo "<br>-----Logical Operators -----<br>";
    // PHP Logical Operators are used to combine conditional statements.

    // and	And	$x and $y	True if both $x and $y are true	
    // or	Or	$x or $y	True if either $x or $y is true	
    // xor	Xor	$x xor $y	True if either $x or $y is true, but not both	
    // &&	And	$x && $y	True if both $x and $y are true	
    // ||	Or	$x || $y	True if either $x or $y is true	
    // !	Not	!$x	True if $x is not true

    $xx = true;
    $yy = false;

    echo var_dump($xx and $yy); // false
    echo "<br>"; 
    echo var_dump($xx or $yy); //true 
    echo "<br>";


    echo "<br>-----String Operators -----<br>";
    // PHP String Operators two operators that are specially designed for strings.

    // .	Concatenation	$txt1 . $txt2	Concatenation of $txt1 and $txt2	
    // .=	Concatenation assignment	$txt1 .= $txt2	Appends $txt2 to $txt1

    $first = "Vitor ";
    $seccond = "Duarte"; 

    echo $first . $seccond;
    echo "<br>"; 


    echo "<br>-----Array Operators -----<br>";
    //     PHP Array Operators are used to compare arrays.

    // +	Union	$x + $y	Union of $x and $y	
    // ==	Equality	$x == $y	Returns true if $x and $y have the same key/value pairs	
    // ===	Identity	$x === $y	Returns true if $x and $y have the same key/value pairs in the same order and of the same types	
    // !=	Inequality	$x != $y	Returns true if $x is not equal to $y	
    // <>	Inequality	$x <> $y	Returns true if $x is not equal to $y	
    // !==	Non-identity	$x !== $y	Returns true if $x is not identical to $y

    $cars = array("Audi","BMW","Toyota");
    var_dump($cars);
    echo "<br>";
    $fastCars = array("Ferrari", "Porsche", "Lamborghini");
    var_dump($fastCars);
    echo "<br>";

    echo var_dump($cars == $fastCars); // false
    echo "<br>";


    echo "<br>-----Conditional Assignment Operators -----<br>";
    // PHP Conditional Assignment Operators are used to set a value depending on conditions:

    // ?:	Ternary	    $x = expr1 ?     : expr3	Returns the value of $x.
    // The value of $x is expr2 if expr1 = TRUE.
    // The value of $x is expr3 if expr1 = FALSE	
    
    $test = true;
    $test2 = false;
    $test3;

    $v = $test ? $test2 : $test3;
    echo var_dump($v);

    // ??	Null coalescing	    $x = expr1 ?? expr2 	Returns the value of $x.
    // The value of $x is expr1 if expr1 exists, and is not NULL.
    // If expr1 does not exist, or is NULL, the value of $x is expr2.
    
?>  