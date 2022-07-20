<?php
    // PHP $_GET
    // PHP $_GET is a PHP super global variable which is used to collect form data after 
    //submitting an HTML form with method="get".
    // $_GET can also collect data sent in the URL.
    
    // looking if there is a $_GET
    if (isset($_GET['name'])){
        $name =  htmlspecialchars($_GET['name']); // avoid using symbols with htmlspecialchars
    } else {
        $name = "World";
    }

    // second get
    if (isset($_GET['color'])){
        $color =  htmlspecialchars($_GET['color']);
    } else {
        $color = "white";
    }
?>

<html> <!-- Making dynamic content with get -->
    <head>
        <style>
            body{
                background: <?php echo $color; ?>;
            }
        </style>
    </head>

    <body <?php if ($name=="Amanda") {echo "style='color:white'";} ?>>
        <h1>Hello <?php echo $name; ?></h1>
        <a href="Get.php?name=Vitor&color=green">Go to Vitor</a><br>
        <a href="Get.php?name=Gabriel&color=red">Go to Gabriel</a><br>
        <a href="Get.php?name=Amanda&color=black">Go to Amanda</a><br>
        <hr>
        <br>

        <!-- Forms with get -->
        <form method="GET">  <!-- action before this GET to select where the form must go  -->
            <input type="text" name="name" placeholder="type your name"><br>
            <input type="text" name="color" placeholder="type your color"><br>
            <button type="submit"> Send</button><br>
        </form>
    </body>
</html>