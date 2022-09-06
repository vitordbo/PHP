<?php
    session_start();

    // Database configuration
    define('SERVER','localhost');
    define('USER','root');
    define('PASSWORD','');
    define('DATABASE','sistemalogin_oop');

    function limpaPost($dados){
        $dados = trim($dados);
        $dados = stripslashes($dados);
        $dados = htmlspecialchars($dados);
        return $dados;
    }

?>