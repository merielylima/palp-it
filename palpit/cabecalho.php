<?php
 require_once 'classes/usuarios.php';
  $u = new Usuarios;
  session_start();
  
  //case 1 - Nao estou conectado
  //case 1.1 - Estou tentando acessar a pagina principal -> Mostrar o cabecalho desconectado.
  //case 1.2 - Estou tentando acessar outra pagina -> voltar para pagina principal
  //case 2 - Estou conectado -> mostrar cabeçalho conectado
  include ("cabecalho_deslogado.php");
?>
