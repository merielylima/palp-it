<?php
 $page_atual = 3;
 include ("cabecalho.php");
 require_once 'classes/usuarios.php';
  $u = new Usuarios;
  $public="";
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
        <h2 class="cartao-header container--titulo"> Suas publicações</h2>
        
        <ol class="flex flex-wrap">
            <?php 
              $usuario = $_SESSION['id_usuario'];
              $sql= $pdo->prepare("SELECT a.id_arquivo, a.titulo, a.foto_v FROM arquivo a
              INNER JOIN usuario u ON u.id_usuario=a.id_usuario_fk WHERE a.status=0 AND u.id_usuario LIKE '$usuario'");
              $sql->execute();
              while($lista = $sql->fetch(PDO::FETCH_ASSOC)):
            ?>
               <li class="cartao__container--item">
                <a href="post.php?id_arquivo=<?php echo $lista["id_arquivo"];?>" class="flex flex-coluna">
                  <div class="item-img">
                    <img src=<?php echo $lista["foto_v"];?>>
                  </div>
                  <span class="item-titulo"><?php echo $lista["titulo"];?></span>
                </a>
              </li>
            <?php
            $public = $lista;
              endwhile;
            ?>
          </ol>
          <div class="sem-conteudo flex flex-coluna" >
            <?php
            if(empty($public)){
            echo "<a href='envio.php' class='center botao--container botao--terciario btn-contribuicao mb-2'> <span class='material-icons-outlined'>add</span> Adicionar</a>";
            }
            ?>  
            </div>         
      </section>

    </div>
</main>
<?php
  include ("rodape.php");
?>