<?php
require_once 'classes/usuarios.php';
  $u = new Usuarios;
  session_start();
?>

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
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons"
  rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/base/base.css">
  <link rel="stylesheet" href="./assets/css/componentes/cartao.css">
  <link rel="stylesheet" href="./assets/css/componentes/inputs.css">
  <link rel="stylesheet" href="./assets/css/componentes/botao.css">
  <link rel="stylesheet" href="./assets/css/cabecalho.css">
  <title>Palp-it</title>
</head>
<body>
  <header class="cabecalho">
    <img src="assets/img/Logo-palp-it.svg" class="cabecalho__logo" alt="Logo Palp-it" />
    <!-- Botão de pesquisa -->
    <div class="cabecalho__pesquisa">
      <input type="search" placeholder="Pesquisar" class="cabecalho__pesquisa--input botao-cabecalho botao-border">
    </div>
    <!-- Links (pages) -->
    <nav>
      <ul class="cabecalho__lista-navegacao">
        <li class="lista-navegacao--item botao-cabecalho botao--container active botao-border ">
          <a href="inicio.php"><span class="material-icons">home</span>Início</a>
        </li>
        <li class="lista-navegacao--item botao-cabecalho botao--container ">
          <a href="perfil.php"> <span class="material-icons">person</span> Perfil</a>
        </li>
        <li class="lista-navegacao--item botao-cabecalho botao--container ">
          <a href="contribuicoes.html"><span class="material-icons">file_upload</span>Contribuições</a>
        </li>
      </ul>
    </nav>
      
      <div class="user">
        <div class="user__menu"> 
          <div class=" lista-navegacao--item botao-cabecalho botao--container botao-border">
            <a href="envio.php"> <span class="material-icons">add</span> Novo envio</a>
          </div>
          <span class="material-icons notifications">
            notifications_none
          </span>
          <img class="user__menu--photo" src=<?php echo '"'.$_SESSION ['foto_p'].'"'?> alt="Foto de perfil"/>
          <span class="material-icons">expand_more</span>
        </div>
      </div>

  </header>
  <main class="container flex flex--centro">

    <nav class="cartao__perfil">
      
    </nav>
    <section class="cartao">

    </section>
  </main>
</body>
</html>