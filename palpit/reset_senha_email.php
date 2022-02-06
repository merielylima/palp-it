<?php
 include ("head.php");
?>
<body>
  <main class="center container-xs">
    <div class="flex flex--coluna px3">
      <section class=" cartao--container cartao-xs">
        <div class="border-bottom">  
            <img src="assets/img/icon/Logo-palp-it.svg" alt="Logo Palp-it"/>
            <h2 class="container--titulo mb-2">Recuperar senha</h2>
        </div>
        <form action="recuperar.php" method="POST">
          <div id="login-erro" class="mensagem-erro hidden">
            <span > Email ou senha inválido</span>
          </div>
          <div class="input-container ">
            <input name="email" id="email" class="input width-full" type="email" placeholder="Email" required>
          </div>
          <button class="botao--container botao--primario width-full"> Redefinir senha</button>
          </form>
          <a href="login.php"> <button class="botao--container botao--secundario width-full ">Voltar</button></a> 
      </section>
    </div>
  </main>
  </body>
</html>