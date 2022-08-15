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
        <style>
            table{
                border-collapse: collapse;
                width: 100%;
            }
            th,td{
                padding: 10px;
                text-align:center;
                border: 1px solid #ccc;
            }
            .hide{
                display: none;
            }
        </style>
    </head>
    <body>
        <h1>Inserting data using php</h1>
        <form id="save-form" method="post">
            <input type="text" name="name" placeholder="Type your name" required>
            <input type="email" name="email" placeholder="Type your email" required>
            <button type="submit" name="save">Save</button>
        </form> 

        <form class="hide" id="update-form" method="post">
            <input type="hidden" id="update_id" name="update_id" placeholder="Update your id" required>
            <input type="text" id="update_name" name="update_name" placeholder="Update your name" required>
            <input type="email" id="update_email" name="update_email" placeholder="Update your email" required>
            <button type="submit" name="update">Update</button>
            <button type="button" id="cancel" name="cancel">cancel</button>
        </form> 

        <?php  // INSERT DATA
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

        <?php
        // UPDATE FORM
        if(isset($_POST['update']) && isset($_POST['update_id']) && isset($_POST['update_name']) && isset($_POST['update_email'])){
            // UPDATE DATA 
            $id = cleanPost($_POST['update_id']);
            $nameUpdate = cleanPost($_POST['update_name']);
            $emailUpdate = cleanPost($_POST['update_email']);
        
            
             // check if is a empty name 
             if ($nameUpdate == "" || $nameUpdate == null){
                echo "Name can't be empty";
                exit();
            }

            // check if is a empty email
            if($emailUpdate == "" || $emailUpdate==null){
                echo "Email can't be empty";
                exit();    
            }

            // check if is a ok name 
            if (!preg_match("/^[a-zA-Z-' ]*$/",$nameUpdate)) {
                echo "<b style='color:red'>Only letters and spaces area allowed</b>";
                exit();
            }

            //check if is a ok email 
            if (!filter_var($emailUpdate, FILTER_VALIDATE_EMAIL)) {
                echo "<b style='color:red'>This email isn't valid!</b>";
                exit();
            }

            $sql = $pdo->prepare("UPDATE clients SET name=?, email=? WHERE id=?");
            $sql->execute(array($nameUpdate, $emailUpdate, $id));

            echo "Update ".$sql->rowCount()." line";
            
        }         
        ?>

        <?php 
            // SELECT DATA FROM TABLE => can add a filter WHERE email ? 
            $sql = $pdo->prepare("SELECT * FROM clients");
            $sql->execute();
            $dataSelect = $sql->fetchAll();

            /*
            // SELECT DATA FROM TABLE => can add a filter WHERE email ? 
            $sql = $pdo->prepare("SELECT * FROM clients WHERE email = ?");
            $email = "vitor@email.com";
            $sql->execute(array($email));
            $dataSelect = $sql->fetchAll();
            
            echo "<pre>";
            print_r($data);
            echo "</pre>";
            */
        ?>

        <?php 
            if(count($dataSelect) > 0){
                echo "<br><table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>";

                foreach($dataSelect as $key => $value){
                    echo "<tr>
                                <th>".$value['id']."</th>
                                <th>".$value['name']."</th>
                                <th>".$value['email']."</th>
                                <th><a href='#' class='btn-update' data-id='".$value['id']."' data-name='".$value['name']."' data-email='".$value['email']."'>Update</a></th> 
                            </tr>";
                }

                echo "</table>";
            } else {
                echo "<p>nothing to show</p>";
            }

        ?>

        <br>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            // to update 
            $(".btn-update").click(function(){
                var id = $(this).attr('data-id');
                var name = $(this).attr('data-name');
                var email = $(this).attr('data-email');

                $('#save-form').addClass('hide');
                $('#update-form').removeClass('hide');

                $("#update_id").val(id);
                $("#update_name").val(name);
                $("#update_email").val(email);  
            });

            $('#cancel').click(function(){
                $('#save-form').removeClass('hide');
                $('#update-form').addClass('hide');
            });
        </script>
    </body>
</html>