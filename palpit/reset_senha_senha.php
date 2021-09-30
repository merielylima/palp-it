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
            <h2 class="container--titulo">Recuperar senha</h2>
        </div>
        <form action="./reset_senha_concluido.phps">
          <div class="input-container">
            <input name="senha" id="senha" class="input width-full" type="password" placeholder="Senha" title="A senha deve conter entre 6 a 12 caracteres, com uma letra maiúscula e um número." required>
            <!--<span class="input-mensagem-erro">Este campo não está válido</span> -->
          </div>
          <div class="input-container">
              <input name="senha" id="senha" class="input width-full" type="password" placeholder="Confirmação de senha" title=""A senha deve conter entre 6 a 12 caracteres, com uma letra maiúscula e um número." required>
              <!--<span class="input-mensagem-erro">Este campo não está válido</span> -->
          </div>
          <button class="botao--container botao--primario width-full"> Redefinir senha</button>
        </form>
      </section>
    </div>
  </main>
</body>
</html>