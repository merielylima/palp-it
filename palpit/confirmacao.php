<?php
    require_once 'classes/usuarios.php';
    $u = new Usuarios;
    //recuperar as informações
    $email = $_GET ['email'];
    $codigo = $_GET ['codigo'];
        
    $u->conectar();

    if ($u->confirmar($email, $codigo)){
        //true;
        header ("Location: cadastro_concluido.php");//Chamada de pagina
    }
    else{
        //false;
        header ("Location: cadastro_error.php");
    }
    
?>
