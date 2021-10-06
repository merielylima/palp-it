<body>    
  <header class="cabecalho py-1 px-2 px-5">
    <div class="cabecalho__content ">
      <div class="cabecalho__left-side flex flex-items-center ">
        <a href="inicio.php" class=" flex flex-items-center"> <img src="assets/img/Logo-palp-it.svg" class="cabecalho--logo" alt="Logo Palp-it"/></a>
            <div class="cabecalho--pesquisa px-4">
                <input type="search" placeholder="Pesquisar" class=" search-icon input-pesquisa botao--container border">
            </div>
            <nav class="lista-navegacao">
              <ul class="flex ">
                <li class="lista-navegacao--item  botao--container mx-2 ">
                  <a href="inicio.php"><span class="material-icons">home</span> Início</a>
                </li>
                <li class="lista-navegacao--item  botao--container mx-2 active">
                  <a href="perfil.php"> <span class="material-icons">person</span> Perfil</a>
                </li>
                <li class="lista-navegacao--item  botao--container mx-2">
                  <a href="contribuicoes.php"><span class="material-icons">file_upload</span> Contribuições</a>
                </li>
              </ul>
            </nav>
      </div>
      <div class="cabecalho__right-side flex flex-items-center">
        <div id="js-menu" class="botao--container menu">
          <img src="assets/img/menu.svg" class="menu-icon" alt="Icone Menu">
        </div>
        <div class="user lista-navegacao">
          <div class="user__menu"> 
            <div class=" lista-navegacao--item botao-cabecalho botao--container border">
              <a href="envio.php"> <span class="material-icons">add</span> Novo envio</a>
            </div>
            <span class="material-icons notifications">
              notifications_none
            </span>
            <img class="user__menu--photo" src=<?php echo '"'.$_SESSION ['foto_p'].'"'?>  alt="Foto de perfil">
            <span class="material-icons">expand_more</span>
          </div>
        </div>
        </div>
      </div>
    </div>
  </header>