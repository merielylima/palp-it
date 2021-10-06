<?php
 include ("head.php");
?>
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