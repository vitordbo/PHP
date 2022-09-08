<?php
    require_once('class/config.php');
    require_once('autoload.php');

    //check if there is a post 
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['repeat_password'])){
        // get things from post and clean 
        $nome = limpaPost($_POST['name']);
        $email = limpaPost($_POST['email']);
        $senha = limpaPost($_POST['password']);
        $repete_senha = limpaPost($_POST['repeat_password']);

        // chek if post values are empty 
        if(empty($nome) or empty($email) or empty($senha) or empty($repete_senha) or empty($_POST['termos'])){
            $erro_geral = "All fields are required!";
        }else{
            //instantiate user class
            $usuario = new Usuario($nome,$email,$senha);

            // change repeat password
            $usuario->set_repeticao($repete_senha);

            // validate
            $usuario->validar_cadastro();

            // if there isn't any error
            if(empty($usuario->erro)){
                //insert
                if($usuario->insert()){
                    header('location: index.php');
                }else{
                    //error
                    $erro_geral = $usuario->erro["erro_geral"];
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <title>Register</title>
</head>
<body>
    <form method="POST">
        <h1>Register</h1>

        <?php if(isset($erro_geral)){?>
        <div class="erro-geral animate__animated animate__rubberBand">
            <?php echo $erro_geral; ?>
        </div>
        <?php } ?>

        <div class="input-group">
            <img class="input-icon" src="img/card.png">
            <input <?php if (isset ($usuario->erro["erro_nome"]) or isset($erro_geral)){ echo 'class="erro-input"'; }?> name="name" type="text" <?php if(isset($_POST['name'])){echo 'value="'.$_POST['name'].'"';}?> placeholder="Full name" required>
            <div class="erro"><?php if(isset($usuario->erro["erro_nome"])){echo $usuario->erro["erro_nome"];}?></div>
        </div>


        <div class="input-group">
            <img class="input-icon" src="img/user.png">
            <input <?php if(isset($usuario->erro["erro_email"]) or isset($erro_geral)){ echo 'class="erro-input"'; }?> type="email" name="email" <?php if(isset($_POST['email'])){echo 'value="'.$_POST['email'].'"';}?> placeholder="email" required>
            <div class="erro"> <?php if(isset($usuario->erro["erro_email"])){echo $usuario->erro["erro_email"];}  ?> </div>
        </div>

        <div class="input-group">
            <img class="input-icon" src="img/lock.png">
            <input <?php if(isset($usuario->erro["erro_senha"]) or isset($erro_geral)){ echo 'class="erro-input"'; }?>  type="password" name="password" <?php if(isset($_POST['password'])){echo 'value="'.$_POST['password'].'"';}?> placeholder="Password" required>
            <div class="erro"> <?php if(isset($usuario->erro["erro_senha"])){echo $usuario->erro["erro_senha"];}  ?> </div>
        </div>

        <div class="input-group">
            <img class="input-icon" src="img/lock-open.png">
            <input <?php if(isset($usuario->erro["erro_repete"]) or isset($erro_geral)){ echo 'class="erro-input"'; }?>  type="password" name="repeat_password" <?php if(isset($_POST['repeat_password'])){echo 'value="'.$_POST['repeat_password'].'"';}?> placeholder="Repeat your password" required>
            <div class="erro"> <?php if(isset($usuario->erro["erro_repete"])){echo $usuario->erro["erro_repete"];}  ?> </div>
        </div>   
        
        <div <?php if(isset($erro_geral) && $erro_geral=="Todos os campos são obrigatórios!"){echo 'class="input-group erro-input"';}else{ echo 'class="input-group"';}  ?> >
            <input type="checkbox" id="termos" name="termos" value="ok" required>
            <label for="termos">Do you agree with our <a class="link" href="#">privacy policy</a> and with <a class="link" href="#">terms of use</a></label>
        </div>  
       
        
        <button class="btn-blue" type="submit">Register</button>
        <a href="index.php">Already have an account</a>
    </form>
</body>
</html>