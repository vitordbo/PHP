<?php
   require('config/connection.php'); 

   if(isset($_GET['cod_confirm']) && !empty($_GET['cod_confirm'])) {
        // clean get 
        $cod = cleanPost($_GET['cod_confirm']);
        
        // verify if the user exists
        $sql = $pdo->prepare("SELECT * FROM users WHERE confirmation_code=? LIMIT 1");
        $sql->execute(array($cod));
        $user = $sql->fetch(PDO::FETCH_ASSOC); // to see if cath a user

        if($user){
            // update status for confirm
            $status = "confirmed";
            $sql = $pdo->prepare("UPDATE users SET status=? WHERE confirmation_code=?");
            if($sql->execute(array($status,$cod))){
                header('location: index.php?result=ok');
            }
        } else{
            echo "<h1>Not valid confirmation code!</h1>"; 
        }
    }

?>  