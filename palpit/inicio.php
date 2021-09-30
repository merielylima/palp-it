<?php
  include ("cabecalho.php");
  require_once 'classes/usuarios.php';
    $u = new Usuarios;
    session_start();
?>
  <main class="container flex flex--centro">

    <nav class="cartao__perfil">
      
    </nav>
    <section class="cartao">

    </section>
  </main>
  <?php
    include ("rodape.php");
  ?>  
