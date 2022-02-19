<?php
 include ("head.php");
?>
<body>
  <main class="center container-xs">
    <div class="flex flex--coluna px-3">
      <section class="cartao--container cartao-xs ">
        <div class="border-bottom">
            <a href="inicio.php" class=" flex">
                <img src="assets/img/icon/Logo-palp-it.svg" alt="Logo Palp-it"/>
            </a>
            <h2 class="container--titulo mb-2">Entre no Palp-it</h2>
        </div>
        <div id="login-erro" class="mensagem-erro hidden">
          <span > Email ou senha inválido</span>
        </div>
        <div class="input-container ">
            <input name="email" id="email" class="input width-full" type="email" placeholder="Email" required>
        </div>
        <div class="input-container"> 
            <input name="senha" id="senha" class="input width-full" type="password" placeholder="Senha" title="A senha deve conter entre 6 a 12 caracteres, deve conter pelo menos uma letra maiúscula, um número e não deve conter símbolos." required>
            
        </div>
        <a href="reset_senha_email.php" class="flex--right link"> Esqueceu sua senha?</a>
      <button onClick="logar()" class="botao--container botao--primario width-full"> Entrar </button>
      </section>
      <section class=" cartao--container cartao-xs">
        <p> Ainda não é membro?</p> <a href="cadastro.php" class="link link-externo"> Cadastre-se já </a>
      </section>
    </div> 
  </main>
</body>
</html>