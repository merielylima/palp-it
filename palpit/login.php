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
  <link rel="stylesheet" href="./assets/css/base/base.css">
  <link rel="stylesheet" href="./assets/css/login.css">
  <link rel="stylesheet" href="./assets/css/componentes/cartao.css">
  <link rel="stylesheet" href="./assets/css/componentes/inputs.css">
  <link rel="stylesheet" href="./assets/css/componentes/botao.css">
  <title>Palp-it</title>
</head>
<body>
  <main class="container container-xs">
    <div class="content flex flex--centro flex--coluna mt7">
      <section class=" cartao--container cartao-xs">
        <div class="border-bottom">
            <img src="assets/img/Logo-palp-it.svg" alt="Logo Palp-it"/>
            <h2 class="container--titulo">Entre no Palp-it</h2>
        </div>
        <form action="logar.php">
          <div class="input-container ">
            <input name="email" id="email" class="input width-full" type="email" placeholder="Email" required>
            <!--<span class="input-mensagem-erro">Este campo não está válido</span>-->
        </div>
        <div class="input-container "> 
            <input name="senha" id="senha" class="input width-full" type="password" placeholder="Senha" title="A senha deve conter entre 6 a 12 caracteres, deve conter pelo menos uma letra maiúscula, um número e não deve conter símbolos." required>
            <!--<span class="input-mensagem-erro">Este campo não está válido</span>-->
          </div>
          <a href="reset_senha_email.html" class="reset-senha link"> Esqueceu sua senha?</a>
        <button class="botao--container botao--primario width-full"> Entrar </button>
        
        </form>
      </section>
      <section class=" cartao--container cartao-xs">
        <p> Ainda não é membro?</p> <a href="cadastro.html" class="link link-externo"> Cadastre-se já </a>
      </section>
    </div>
  </main>
</body>
</html>