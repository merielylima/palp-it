<?php
  include ("head.php");
      //recuperar as informações
      $email = $_GET ['email'];
      $confirmacao = $_GET ['token'];
?>
<body>
  <main class="center container-xs">
    <div class="flex flex--coluna px3">
      <section class=" cartao--container cartao-xs">
        <div class="border-bottom">
            <img src="assets/img/icon/Logo-palp-it.svg" alt="Logo Palp-it"/>
            <h2 class="container--titulo mb-2">Recuperar senha</h2>
        </div>
        <form action="redefinir.php" method="POST">
          <div class="input-container">
            <input name="senha" id="senha" class="input width-full" type="password" placeholder="Senha" title="A senha deve conter entre 6 a 12 caracteres, com uma letra maiúscula e um número." required>
            <!--<span class="input-mensagem-erro">Este campo não está válido</span> -->
          </div>
          <div class="input-container">
              <input name="senha" id="senha" class="input width-full" type="password" placeholder="Confirmação de senha" title=""A senha deve conter entre 6 a 12 caracteres, com uma letra maiúscula e um número." required>
              <!--<span class="input-mensagem-erro">Este campo não está válido</span> -->
          </div>
          <input name="email" id=email type="hidden" value="<?php echo $email; ?>">
          <input name="token" id=token type="hidden" value=<?php echo $confirmacao ?>>
          <button class="botao--container botao--primario width-full"> Redefinir senha</button>
        </form>
      </section>
    </div>
  </main>
</body>
</html> 