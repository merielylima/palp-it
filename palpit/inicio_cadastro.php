<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Palp-it</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons"
rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/base/base.css">
  <link rel="stylesheet" href="./assets/css/componentes/cartao.css">
  <link rel="stylesheet" href="./assets/css/componentes/inputs.css">
  <link rel="stylesheet" href="./assets/css/componentes/botao.css">
  <link rel="stylesheet" href="./assets/css/cabecalho.css">
</head>
<body>
  <header class="cabecalho">
    <img src="assets/img/Logo-palp-it.svg" class="cabecalho__logo" alt="Logo Palp-it"/>
    <!-- Botão de pesquisa -->
    <div class="flex flex--end">
      <div class="cabecalho__pesquisa cabecalho--item">
        <input type="search" placeholder="Pesquisar no Palp-it" class="cabecalho__pesquisa--input">
      </div>
      <div class="cabecalho--item botao">
        <a href="login.php"> Entrar </a>
      </div>
      <div class="cabecalho--item botao botao--simples">
        <a href="cadastro.php"> Criar conta </a>
      </div>
      </div>
  </header>
  <div class="banner flex flex--centro">
    <img src="assets/img/Banner.svg"/>
  </div>
  <main class="container flex flex--centro " >
    
    <aside class=" cartao--container aside">
      <div class="Grau de escolaridade">
        <div class="input-container ">
          <label class="checkbox--label ">
            <input type="checkbox" name=""> 

        </label>
        </div>

      </div>
    </aside>
      
    </div>
    <section class=" cartao--container ">
      <h2 class="container--titulo"> Novo envio </h2>
      <p class="card--description">
        Os arquivos submetidos são avaliados por um mediador, para então serem postados.
      </p>
  </main>
</body>
</html>