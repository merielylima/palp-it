<?php
include ("head.php");
require_once 'classes/usuarios.php';
require_once 'classes/usuarios.php';
$u = new Usuarios;
   
session_start(); //iniciando sessão
$u->conectar(); //conexão banco de dados
   
//recuperação das informações formulario
$email = addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);
$confirmacao = addslashes($_POST['token']);

    if($u->confirmar($email,$confirmacao)){
        $sql = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
        $sql->execute([$email]);
        $info = $sql->fetch();
        
        if($sql->rowCount() == 1){    
            if(isset($senha)){
                    //$senha = $_POST['senha'];
                    $criptografada = md5($senha);
                    $sql = $pdo->prepare("UPDATE usuario SET senha = ? WHERE email = ?");
                    $sql->execute([$criptografada, $email]);
                    header ("Location: reset_senha_concluido.php");                                                
            }
        }else{
            echo 'Não encontramos esse registro';
        }  
    }else{
        echo 'Precisa de um token';
    }

?>