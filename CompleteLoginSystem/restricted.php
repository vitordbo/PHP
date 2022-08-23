<?php
    require('config/connection.php');

    // verfify if has authorization
    $user = auth($_SESSION['TOKEN']);
    if ($user){
        //authorized
        echo "<div>
        <h1 style='text-align: center;'>Welcome <b style='color:red'>".$user['name']."</b><br><br>
        <a style='background:green; text-decoration: none; color:white; padding:20px; border-radius: 5px;' href='logout.php'>Logout</a></h1><br><br>
        </div>";
     
    }else{
        // back to login => not authorized
        header('location: index.php');
    }


    /* turn into a function in connection.php
    // verfify if has authorization
    $sql = $pdo->prepare("SELECT * FROM users WHERE token=? LIMIT 1");
    $sql->execute(array($_SESSION['TOKEN'])); // token that is save on the session
    $user = $sql->fetch(PDO::FETCH_ASSOC);

    // if not find the user
    if(!$user){
        header('location: index.php');
    }else{
        // if finds the user
        echo "<h1>Welcome <b style='color:red'>".$user['name']."</b></h1>";
        echo "<br><br><a style='background:green; text-decoration: none; color:white; padding:20px; border-radius: 5px;' href='logout.php'>Logout</a>";
    }
    */
?>