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
  <link rel="stylesheet" href="./assets/css/perfil.css">
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
        <li class="lista-navegacao--item botao-cabecalho botao--container">
          <a href="inicio.php"><span class="material-icons">home</span>Início</a>
        </li>
        <li class="lista-navegacao--item botao-cabecalho botao--container botao-border active">
          <a href="perfil.php"> <span class="material-icons">person</span> Perfil</a>
        </li>
        <li class="lista-navegacao--item botao-cabecalho botao--container">
          <a href="contribuicoes.php"><span class="material-icons">file_upload</span>Contribuições</a>
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
          <img class="user__menu--photo" src=<?php echo '"'.$_SESSION ['foto_p'].'"'?> alt="Foto de perfil">
          <span class="material-icons">expand_more</span>
        </div>
      </div>

  </header>

  <main  class="container container-xl my-xl" >
    <div class="flex flex--centro flex--coluna flex--row pl-5 pr-5 ">
      <nav class="flex-items-center left-side  cartao--container flex-shrink-0 mb-4">
        <div class="flex mb-3 flex-items-center d-block"> 
          <img class=" mr-3 avatar col-2 flex-shrink-0" src=<?php echo '"'.$_SESSION ['foto_p'].'"'?>>
          <div class="vcartao-nome">
            <span class="vcard-fullname block"><?php echo '"'.$_SESSION ['nome'].'"'?></span>
            <span class="vcard-username block"><?php echo '"'.$_SESSION ['email'].'"'?></span>
          </div>
        </div>
        <div class="flex flex--coluna">
          <p><?php echo '"'.$_SESSION ['profissao'].'"'?></p>
          <ul class="my-2">
            <li> <spam class="material-icons">location_on </spam>Tucuruí - Pará</li> 
            <li> <span class="material-icons"> mail</span><?php echo '"'.$_SESSION ['email'].'"'?></li>
          </ul>
          <button class="botao--container botao--secundario width-full"> Editar perfil </button>  
        </div>
      </nav>
      <section class=" right-side cartao--container cartao-p2 flex-shrink-0 relative">
        <h2 class="container--titulo"> Mais populares</h2>
        <div class="flex flex--centro ordenar input-envio option input flex-items-center ">
          <label class="">Ordenar por: </label>
          <select name="" id="" class="a">
            <option value=""> Populares</option>
            <option value=""> Novos</option>
            <option value=""> Antigos</option>
          </select>
        </div>
        <ol class="flex wrap-evenly">
          <li class="flex flex-items-center flex--coluna item">
            <img src="assets/img/publicacoes/mapa-do-brasil.png" >
            <span class="">Mapa do brasil</span>
          </li>
          <li class="flex flex-items-center flex--coluna item">
            <img src="assets/img/publicacoes/modelo-atomico.png" >
            <span class="">Molecula H2O</span>
          </li>
          <li class="flex flex-items-center flex--coluna item">
            <img src="assets/img/publicacoes/rosa-dos-ventos.png" >
            <span class="">Rosa dos ventos</span>
          </li>
          <li class="flex flex-items-center flex--coluna item">
            <img src="assets/img/publicacoes/sistema-solar.png" >
            <span class="">Sistema Solar</span>
          </li>
          <li class="flex flex-items-center flex--coluna item">
            <img src="assets/img/publicacoes/modelo-atomico.png" >
            <span class="">Modelo Atômico</span>
          </li>
          <li class="flex flex-items-center flex--coluna item">
            <img src="assets/img/publicacoes/circulo-trigonometrico.png" >
            <span class="">Circulo trigonométrico</span>
          </li>
        </ol>
      </section>
    </div>
  </main>
</body>
</html>