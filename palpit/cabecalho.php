
<?php
include ("head.php");

if (session_status() !== PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
    session_start();
}

if(isset($_SESSION["id_usuario"])){ //Verificando se variavel foi iniciada
//true;
include ("cabecalho_logado.php");
}else{
//false;
session_destroy();
include ("cabecalho_deslogado.php");
}
//se 1 - Nao estou conectado
//case 1.1 - Estou tentando acessar a pagina principal -> Mostrar o cabecalho desconectado.
//case 1.2 - Estou tentando acessar outra pagina -> voltar para pagina principal
//case 2 - Estou conectado -> mostrar cabeçalho conectado
//include ("cabecalho_deslogado.php");
?>
