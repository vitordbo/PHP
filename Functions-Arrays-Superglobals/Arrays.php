<?php 
    // PHP Arrays
    echo "----- Simple array -----<br>";
    // An array stores multiple values in one single variable:
    
    $cars = array("Audi", "BMW", "Ferrari");
    echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";


    // What is an Array? An array is a special variable, which can hold more than one value at a time.
    // If you have a list of items (a list of car names, for example), 
    //storing the cars in single variables could look like this:

    // $cars1 = "Audi";
    // $cars2 = "BMW";
    // $cars3 = "Ferrari";
    // However, what if you want to loop through the cars and find a specific one? And what if you had not 3 cars, but 300?

    // The solution is to create an array!

    // An array can hold many values under a single name, and you can access the values by referring to an index number.


    // Create an Array in PHP
    // In PHP, the array() function is used to create an array:
    // In PHP, there are three types of arrays:

    // Indexed arrays - Arrays with a numeric index
    // Associative arrays - Arrays with named keys
    // Multidimensional arrays - Arrays containing one or more arrays


    echo "<br>----- Length of an Array -----<br>";
    // Get The Length of an Array - The count() Function
    // The count() function is used to return the length (the number of elements) of an array:

    echo count($cars); // 3


    // PHP Indexed Arrays
    echo "<br>----- Indexed Arrays -----<br>";
    // There are two ways to create indexed arrays:
    // The index can be assigned automatically (index always starts at 0), like this:

    // $names = array("Vitor", "Gabriel", "Maria");
    // or the index can be assigned manually:

    // $cars[0] = "Vitor";
    // $cars[1] = "Gabriel";
    // $cars[2] = "Maria";

    // The following example creates an indexed array named $names, assigns three elements to it, and then prints a text containing the array values:
    $names = array("Vitor", "Gabriel", "Maria");
    echo "The names are " . $names[0] . ", " . $names[1] . " and " . $names[2] . "<br>";

    // Loop Through an Indexed Array
    echo "<br>----- Loop Through an Indexed Array -----<br>";
    // To loop through and print all the values of an indexed array, you could use a for loop, like this:

    $arrlength = count($names);
    for($x = 0; $x < $arrlength; $x++) {
        echo $names[$x];
        echo "<br>";
    }


    // PHP Associative Arrays
    echo "<br>----- Associative Arrays -----<br>";
    // Associative arrays are arrays that use named keys that you assign to them.
    // There are two ways to create an associative array: 

    $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
    // or:

    // $age['Peter'] = "35";
    // $age['Ben'] = "37";
    // $age['Joe'] = "43";
    // The named keys can then be used in a script:

    echo "Peter is " . $age['Peter'] . " years old <br>";


    //     Loop Through an Associative Array
    echo "<br>-----  Loop Through an Associative Array -----<br>";
    // To loop through and print all the values of an associative array, you could use a foreach loop, like this:

    foreach($age as $x => $x_value) {
        echo "Key=" . $x . ", Value=" . $x_value;
        echo "<br>";
    }


    // PHP - Multidimensional Arrays
    // A multidimensional array is an array containing one or more arrays.

    // PHP supports multidimensional arrays that are two, three, four, five, or more levels deep. However, arrays more than three levels deep are hard to manage for most people.

    // The dimension of an array indicates the number of indices you need to select an element.
    // For a two-dimensional array you need two indices to select an element
    // For a three-dimensional array you need three indices to select an element

    // PHP - Two-dimensional Arrays
    echo "<br>-----  two-dimensional Arrays -----<br>";
    // A two-dimensional array is an array of arrays (a three-dimensional array is an array of arrays of arrays).

    // First, take a look at the following table:

    // Name	    Stock	Sold
    // Volvo	    22	18
    // BMW	        15	13
    // Saab	        5	2
    // Land Rover   17	15
    // We can store the data from the table above in a two-dimensional array, like this:

    $cars = array (
    array("Volvo",22,18),
    array("BMW",15,13),
    array("Ferrari",5,2),
    array("Land Rover",17,15)
    );

    // Now the two-dimensional $cars array contains four arrays, and it has two indices: row and column.

    // To get access to the elements of the $cars array we must point to the two indices (row and column):
    echo $cars[0][0].": In stock: ".$cars[0][1].", sold: ".$cars[0][2].".<br>";
    echo $cars[1][0].": In stock: ".$cars[1][1].", sold: ".$cars[1][2].".<br>";
    echo $cars[2][0].": In stock: ".$cars[2][1].", sold: ".$cars[2][2].".<br>";
    echo $cars[3][0].": In stock: ".$cars[3][1].", sold: ".$cars[3][2].".<br>";

    echo "<br>-----  two-dimensional Arrays with for -----<br>";
    //We can also put a for loop inside another for loop to get the elements of the $cars array (we still have to point to the two indices):
    for ($row = 0; $row < 4; $row++) {
        echo "<p><b>Row number $row</b></p>";
        echo "<ul>";
            for ($col = 0; $col < 3; $col++) {
            echo "<li>".$cars[$row][$col]."</li>";
            }
        echo "</ul>";
    }


    // PHP Sorting Arrays
    echo "<br>----- Sorting Arrays -----<br>";
    // The elements in an array can be sorted in alphabetical or numerical order, descending or ascending.

    // PHP - Sort Functions For Arrays

    // sort() - sort arrays in ascending order
    // rsort() - sort arrays in descending order
    // asort() - sort associative arrays in ascending order, according to the value
    // ksort() - sort associative arrays in ascending order, according to the key
    // arsort() - sort associative arrays in descending order, according to the value
    // krsort() - sort associative arrays in descending order, according to the key
    // Sort Array in Ascending Order - sort()
 
    // The following example sorts the elements of the $numbers array in ascending numerical order:
    $numbers = array(4, 6, 2, 22, 11);
    sort($numbers);
    var_dump($numbers);
    echo "<br>";


    // Sort Array in Descending Order - rsort()
    echo "<br>----- Sorting Arrays in Descending -----<br>";
    // The following example sorts the elements of the $cars array in descending alphabetical order:

    $numbers = array(4, 6, 2, 22, 11);
    rsort($numbers);
    var_dump($numbers);
    echo "<br>";
    

    // Sort Array (Ascending Order), According to Value - asort()
    echo "<br>----- Sort Array (Ascending Order), According to Value-----<br>";
    // The following example sorts an associative array in ascending order, according to the value:

    $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
    asort($age);
    var_dump($age);
    echo "<br>";


    // Sort Array (Ascending Order), According to Key - ksort()
    echo "<br>----- Sort Array (Ascending Order), According to key-----<br>";
    // The following example sorts an associative array in ascending order, according to the key:

    $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
    ksort($age);
    var_dump($age);
    echo "<br>";


    echo "<br>----- Sort Array (Descending Order), According to Value-----<br>";
    // Sort Array (Descending Order), According to Value - arsort()
    // The following example sorts an associative array in descending order, according to the value:

    $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
    arsort($age);
    var_dump($age);
    echo "<br>";

    echo "<br>----- Sort Array (Descending Order), According to key-----<br>";
    // Sort Array (Descending Order), According to Key - krsort()

    $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
    krsort($age);
    var_dump($age);
    
?>