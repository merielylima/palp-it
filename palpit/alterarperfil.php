<?php
  require_once 'classes/usuarios.php';
  $u = new Usuarios;
  
  //session_start(); //iniciando sessão
  
  $u->conectar(); //conexão banco de dados
  
	//recuperação das informações formulario
	$nome = addslashes($_POST['user_profile_name']);
	$sobre = addslashes($_POST['user_profile_bio']);
	$cidade = addslashes($_POST['cidade']);

    $u->alterarperfil($nome,$sobre,$cidade);
    
    header("Location: perfil.php");

?>
 