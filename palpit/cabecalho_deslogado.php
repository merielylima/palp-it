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
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/base/base.css">
    <link rel="stylesheet" href="./assets/css/componentes/cartao.css">
    <link rel="stylesheet" href="./assets/css/componentes/inputs.css">
    <link rel="stylesheet" href="./assets/css/componentes/botao.css">
    <link rel="stylesheet" href="./assets/css/cabecalho.css">
    <link rel="stylesheet" href="./assets/css/perfil.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="./assets/css/contribuicao.css">
    <link rel="stylesheet" href="./assets/css/inicio.css">
    <title>Palp-it</title>
  </head>
  <body>
    <header class="cabecalho py-1 px-2 px-5">
      <div class="cabecalho__content">
        <div class="cabecalho__left-side flex flex-items-center">
          <a href="inicio.php" class=" flex flex-items-center">
            <img src="assets/img/Logo-palp-it.svg" class="cabecalho--logo" alt="Logo Palp-it"/>
          </a>
          <div class="cabecalho--pesquisa">
              <input type="search" placeholder="Pesquisar" class="ml-4 search-icon input-pesquisa botao--container border">
          </div>
        </div>
        <div class="cabecalho__right-side">
          <nav >
            <ul class="flex">
              <li> 
                <a href="login.php" class="botao--container"> Entrar </a>
              </li>
              <li> 
                <a href="cadastro.php"  class="botao--container border " > Criar conta </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
  </body>
</html>