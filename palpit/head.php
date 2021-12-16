<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"> 
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
  <link rel="stylesheet" href="./assets/css/contribuicao.css">
  <link rel="stylesheet" href="./assets/css/inicio.css">
  <title>Palp-it</title>
  <script>
  function logar(){
    console.log("entrando");
    $.post({
      url: "logar.php",
      data: {
        email: document.getElementById ("email").value,
        senha: document.getElementById ("senha").value,
      },
      success: function (result) {
        console.log(result);
        if (result == 0) {
          window.location.href="index.php";
        }
        else {
          //chamar classe de erro em input e mostrar mensagem 
            //document.getElementById ("emailL").style.color = "#f00";
            //document.getElementById ("passwordL").style.color = "#f00";
        }
      }
    });
  }
</script>
</head>