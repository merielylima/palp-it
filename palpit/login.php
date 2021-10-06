<?php
 include ("head.php");
?>
<body>
  <main class="container container-xs">
    <div class="content flex flex--centro flex--coluna mt7">
      <section class=" cartao--container cartao-xs">
        <div class="border-bottom">
            <img src="assets/img/Logo-palp-it.svg" alt="Logo Palp-it"/>
            <h2 class="container--titulo">Entre no Palp-it</h2>
        </div>
        <div >
          <div class="input-container ">
            <input name="email" id="email" class="input width-full" type="email" placeholder="Email" required>
            <!--<span class="input-mensagem-erro hidden">Este campo não está válido</span>-->
        </div>
        <div class="input-container "> 
            <input name="senha" id="senha" class="input width-full" type="password" placeholder="Senha" title="A senha deve conter entre 6 a 12 caracteres, deve conter pelo menos uma letra maiúscula, um número e não deve conter símbolos." required>
            <!--<span class="input-mensagem-erro">Este campo não está válido</span>-->
          </div>
          <a href="reset_senha_email.php" class="reset-senha link"> Esqueceu sua senha?</a>
        <button onClick="logar()" class="botao--container botao--primario width-full"> Entrar </button>
        
  </div>
      </section>
      <section class=" cartao--container cartao-xs">
        <p> Ainda não é membro?</p> <a href="cadastro.php" class="link link-externo"> Cadastre-se já </a>
      </section>
    </div>
  </main>
</body>
</html>