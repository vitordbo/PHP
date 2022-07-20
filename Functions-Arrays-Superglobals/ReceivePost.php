<?php // if exists name and age in post 
    
    if (isset($_POST['name']) && isset($_POST['age'])){
        $name = cleanPost($_POST['name']);
        $age = cleanPost($_POST['age']);
        echo "<h2>Name: $name <br> Age: $age </h2>";
    }

    function cleanPost($value){ // clean a post => remove bad characters like a script  
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);

        return $value;
    }
?>