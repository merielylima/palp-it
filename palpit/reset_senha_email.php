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
        <form action="./reset_senha_analise.php" >
          <div class="input-container ">
            <input name="email" id="email" class="input width-full" type="email" placeholder="Email" required>
            <!-- <span class="input-mensagem-erro">Este campo não está válido</span> !-->
          </div>
          <button class="botao--container botao--primario width-full"> Redefinir senha</button>
          </form>
          <a href="login.php"> <button class="botao--container botao--secundario width-full ">Voltar</button></a> 
      </section>
    </div>
  </main>
  </body>
</html>