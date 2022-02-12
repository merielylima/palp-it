
<header class="cabecalho">
  <div class="cabecalho__content">
    <div class="cabecalho__left-side flex flex-items-center">
      <a href="inicio.php" class=" flex">
        <img src="assets/img/icon/Logo-palp-it.svg" alt="Logo Palp-it"/>
      </a>
      <div class="cabecalho--pesquisa">
        <input type="search" placeholder="Pesquisar" class=" input-pesquisa">
      </div>
      <nav class="cabecalho--navegacao items-xl">
        <ul class="flex flex-items-center">
          <li class="botao--container">
            <a href="inicio.php"><span class="material-icons">home</span> Início</a>
          </li>
          <li class="botao--container">
            <a href="perfil.php"> <span class="material-icons">person</span> Perfil</a>
          </li>
          <li class="botao--container">
            <a href="contribuicoes.php"><span class="material-icons">file_upload</span> Contribuições</a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="items-xl cabecalho__right-side flex">
      <div class=" botao-cabecalho botao--container border">
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
    <div id="js-menu" class="botao--container menu">
      <span class="menu-icon material-icons">menu</span>
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
  