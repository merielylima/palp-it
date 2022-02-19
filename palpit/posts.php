<?php
 include ("cabecalho.php");
 require_once 'classes/usuarios.php';
  $u = new Usuarios;
  
  $u->conectar();

 if (!isset($_SESSION['id_usuario'])) {
  // Destrói a sessão por segurança
  session_destroy();
  // Redireciona o visitante de volta para o inicio
  header("Location: index.php"); exit;
}
?>
  <main  class="center container-xl" >
    <div class=" flex flex-coluna p-os"> 
      <section class="cartao__container cartao-xl width-full">
        <h2 class="cartao-header container--titulo"> <?php echo $lista["titulo"];?></h2>
        <div class="cartao--item">
            <img src=<?php echo $lista["foto_v"];?>>
        </div>
      </section>
    </div>
</main>
<?php
  include ("rodape.php");
?>