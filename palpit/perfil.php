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

  <main  class="container container-xl my-xl" >
    <div class="flex flex--centro flex--coluna flex--row px-5  flex-start">
      <nav class="left-side  cartao--container flex-shrink-0 mb-4">
        <div class="info-user mb-3 flex-items-center d-block"> 
          <input id="js-file-uploader" class="hidden" name="profile-picture" type="file" accept="image/png, image/jpeg" />
          <img class=" mr-3 avatar col-2 flex-shrink-0" src=<?php echo '"'.$_SESSION ['foto_p'].'"'?>>
          <div class="vcartao-nome">
            <span class="vcard-fullname block"> <?php echo ''.$_SESSION ['nome'].''?></span>
            <span class="vcard-username block"><?php echo ''.$_SESSION ['email'].''?></span>
          </div>
        </div>
        <div class="flex flex--coluna">
          <p><?php echo ''.$_SESSION ['profissao'].''?></p>
          <ul class="my-2">
            <li> <spam class="material-icons">location_on </spam>Tucuruí - Pará</li> 
            <li> <span class="material-icons"> mail</span><?php echo ''.$_SESSION ['email'].''?></li>
          </ul>
          <button class="botao--container botao--secundario width-full"> Editar perfil </button>  
        </div>
      </nav>
      <section class=" right-side cartao--container cartao-p2 flex-shrink-0 relative">
        <h2 class="container--titulo"> Mais populares</h2>
        <div class="flex flex--centro ordenar input-envio option input flex-items-center ">
          <label class="">Ordenar por: </label>
          <select name="" id="" class="a">
            <option value=""> Populares</option>
            <option value=""> Novos</option>
            <option value=""> Antigos</option>
          </select>
        </div>
        <ol class="flex wrap-evenly">
          <?php 
            $usuario = $_SESSION['id_usuario'];
            $sql= $pdo->prepare("SELECT a.id_arquivo, a.titulo, a.foto_v FROM arquivo a
            INNER JOIN usuario u ON u.id_usuario=a.id_usuario_fk WHERE u.id_usuario LIKE '$usuario'");
            $sql->execute();
            while($lista = $sql->fetch(PDO::FETCH_ASSOC)):
          ?>
            <li class="flex flex-items-center flex--coluna item">
            <img src=<?php echo $lista["foto_v"];?>>
            <span class=""><?php echo $lista["titulo"];?></span>
            </li>
          <?php
            endwhile;
          ?>
        </ol>
      </section>
    </div> 
  </main>

<?php
include ("rodape.php");
?>