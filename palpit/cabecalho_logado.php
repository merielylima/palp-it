
<header class="relative cabecalho" >
  <div class="cabecalho__content">
    <div class="cabecalho__left-side flex flex-items-center">
      <a href="inicio.php" class=" flex">
        <img src="assets/img/icon/Logo-palp-it.svg" class="cabecalho--logo" alt="Logo Palp-it"/>
      </a>
      <div class="cabecalho--pesquisa px-4">
        <input type="search" placeholder="Pesquisar" class=" search-icon input-pesquisa botao--container border">
      </div>
      <nav class="lista-navegacao">
        <ul class="flex ">
          <li class="lista-navegacao--item  botao--container mx-2 ">
            <a href="inicio.php"><span class="material-icons">home</span> Início</a>
          </li>
          <li class="lista-navegacao--item  botao--container mx-2 ">
            <a href="perfil.php"> <span class="material-icons">person</span> Perfil</a>
          </li>
          <li class="lista-navegacao--item  botao--container mx-2">
            <a href="contribuicoes.php"><span class="material-icons">file_upload</span> Contribuições</a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="cabecalho__right-side flex">
      <div id="js-menu" class="botao--container menu">
        <img src="assets/img/icon/menu.svg" class="menu-icon" alt="Icone Menu">
      </div>
      <div class=" lista-navegacao--item botao-cabecalho botao--container border">
        <a href="envio.php">
          <span class="material-icons">add</span> 
          Novo envio
        </a>
      </div>
      <span class="material-icons notifications">notifications_none </span>
      <div id="menu_popup" class="user__menu "> 
        <img class="user__menu--photo" src=<?php echo '"'.$_SESSION ['foto_p'].'"'?>  alt="Foto de perfil">
        <span class="material-icons">expand_more</span>
      </div>
    </div>
  </div>
  <div class="caixa">
    <ul class="">
      <li class="btn-edit"><a href="#" class="">Editar Perfil</a></li>
      <li class="btn-logout"><a href="logout.php" class="">Sair</a></li>
    </ul>
  </div>
</header>
<script src="js/atualizar.js"></script>
  