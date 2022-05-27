<?php
 include ("head.php");
?>
<body>
  <main class="center container-xs">
    <div class="flex flex-coluna px-3">
      <section class=" cartao__container cartao-xs">
        <div class="border-bottom">  
          <a href="inicio.php">
            <img src="assets/img/icon/Logo-palp-it.svg" alt="Logo Palp-it"/>
          </a> 
          <h2 class="container--titulo mb-2">Recuperar senha</h2>
        </div>
        <div>
          <div id="email-erro" class="mensagem-erro hidden">
            <span > Email ou senha inválido</span>
          </div>
          <p class="text-justify my-3"> Ao confirmar a redefinição da senha, será necessário seguir o procedimento a partir do e-mail enviado.</p>
          <div class="input-container ">
            <input name="email" id="email" class="input width-full" type="email" placeholder="Email" required>
          </div>
          <button onClick="recuperar()" class="botao--container botao--primario width-full"> Redefinir senha</button>
        </div>
          <a href="login.php"> <button class="botao--container botao--secundario width-full ">Voltar</button></a> 
      </section>
    </div>
  </main>
  </body>
</html>
