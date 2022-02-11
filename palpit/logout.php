<?php
  require_once 'classes/usuarios.php';
  $u = new Usuarios;
  
  session_start(); //iniciando sessão
  
    $u->conectar(); //conexão banco de dados
    $u->logout();

    header("Location: index.php");

?>