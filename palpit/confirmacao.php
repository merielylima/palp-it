<?php
    require_once 'classes/usuarios.php';
    $u = new Usuarios;

    $email = $_GET ['email'];
    $codigo = $_GET ['codigo'];
        
    $u->conectar();

    if ($u->confirmar($email, $codigo)){
        //echo("ok");
        header ("Location: cadastro_concluido.php");
    }
    else{
        //echo("error");
        header ("Location: cadastro_error.php");
    }
    
?>
