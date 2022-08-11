<?php
    // to show if connection is ok
    require('db/connection.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>inserting data</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h1>Inserting data using php</h1>
        <form method="post">
            <input type="text" name="name" placeholder="Type your name" required>
            <input type="email" name="email" placeholder="Type your email" required>
            <button type="submit" name="save">Save</button>
        </form> 

        <?php 
        /*
        // insert data => SQL injection => not the best way => there is one way more secure 
        $sql = $pdo->prepare("INSERT INTO clients VALUES (null, 'Vitor', 'vitor@email.com', '11-08-2022')");
        $sql->execute();
        */

        /*
        // best way => inside execute => no SQL injection
        $name = "Gabriel";
        $email = "gabriel@email.com";
        $data = date('d-m-Y');
        $sql = $pdo->prepare("INSERT INTO clients VALUES (null,?,?,?)");
        $sql->execute(array($name,$email,$data));
        */

        // using post 
        if (isset($_POST['save']) && isset($_POST['name']) && isset($_POST['email'])){

            $name = cleanPost($_POST['name']);
            $email = cleanPost($_POST['email']);
            $data = date('d-m-Y');

            // check if is a empty name 
            if ($name == "" || $name == null){
                echo "Name can't be empty";
                exit();
            }

            // check if is a empty email
            if($email == "" || $name==null){
                echo "Email can't be empty";
                exit();    
            }

            // check if is a ok name 
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                echo "<b style='color:red'>Only letters and spaces area allowed</b>";
                exit();
            }

            //check if is a ok email 
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<b style='color:red'>This email isn't valid!</b>";
                exit();
            }

            $sql = $pdo->prepare("INSERT INTO clients VALUES (null,?,?,?)");
            $sql->execute(array($name,$email,$data));

            echo "<b style='color:green'>OK!</b>";
        }
        ?>
        <br>
    </body>
</html>