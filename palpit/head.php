<?php

//Verificar se a sessão não já está aberta.
if (session_status() !== PHP_SESSION_ACTIVE) {
  if(getenv('PALPIT_EMAIL') == "" || getenv('PALPIT_SENHA') == ""){
    die ("Variaveis de Ambiente palpit_email e palpit_senha não inicializadas");
  }
  session_start();
}else{
  session_destroy();
}

?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined"  rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons"  rel="stylesheet">
  <script src="jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="./assets/css/base/base.css">
  <link rel="stylesheet" href="./assets/css/componentes/cartao.css">
  <link rel="stylesheet" href="./assets/css/componentes/inputs.css">
  <link rel="stylesheet" href="./assets/css/componentes/botao.css">
  <link rel="stylesheet" href="./assets/css/perfil.css">
  <link rel="stylesheet" href="./assets/css/cabecalho.css">
  <link rel="stylesheet" href="./assets/css/envio.css">
  <link rel="stylesheet" href="./assets/css/login.css">
  <link rel="stylesheet" href="./assets/css/post.css">
  <link rel="stylesheet" href="./assets/css/base/padding.css">
  <link rel="stylesheet" href="./assets/css/base/margin.css">

  
  <script>
  $(document).on("click", "li", function() {
    var aTag = $(this).find("a");
    if ( aTag.attr("href") != undefined ){
      window.location = aTag.attr("href");
    }
  });
  function logar(){
    $.post({
      url: "logar.php",
      data: {
        email: document.getElementById ("email").value,
        senha: document.getElementById ("senha").value,
      },
      success: function (result) {
        if (result == 0) {
          window.location.href="index.php";
        }
        else {
          document.getElementById("login-erro").classList.remove("hidden");
        }
      }
    });
  }
  function logarkey(event){
    if (event.keyCode == 13) {
      logar();
    } 
  }

  function recuperar(){
    $.post({
      url: "recuperar.php",
      data: {
        email: document.getElementById("email").value,
      },
      success: function (result) {
        if (result == 0) {
          console.log ("Email certo");
          window.location.href="reset_senha_analise.php";
        }
        else {
          document.getElementById("email-erro").classList.remove("hidden");
        }
      }
    });
  }
  function submitCadastro(){
    $.post({
      url: "cadastro_analise.php",
      data: {
        nome: document.getElementById("nome").value,
        email: document.getElementById("email").value,
        senha: document.getElementById("senha").value,
        area: $('#area').val(),
        receber: document.getElementById("receber").value,
      },
      success: function (result) {
        if (result == 0) {
          window.location.href="cadastro_submetido.php?email="+document.getElementById("email").value;
        }
        else if(result==1){
          alert("Email de confirmação não enviado, contacte comunidadepalpit@gmail.com");
        }
        else if(result==2){
          alert("Já existe um usuário com o mesmo email.");
        }
        else{
          alert("Ocorreu um erro inesperado, contacte comunidadepalpit@gmail.com");
        }
      }
    });
  }
  
  </script>
</head>
