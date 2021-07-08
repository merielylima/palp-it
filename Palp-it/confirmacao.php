<?php
    require_once 'classes/usuarios.php';
    $u = new Usuarios;

    $email = $_GET ['email'];
    $codigo = $_GET ['codigo'];
    
    $sql = 'SELECT * FROM usuarios WHERE confirmacao=\''.$codigo.'\' AND email=\''.$email.'\'';
    $u->conectar("test","localhost","root","");

    if ($u->confirmar($email, $codigo)){
        header ("Location: cadastro_concluido.html");
    }
    else{
        header ("Location: cadastro_error.html");
    }
    
?>
