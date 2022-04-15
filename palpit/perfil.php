<?php
 $page_atual = 2;
 include ("cabecalho.php");
 require_once 'classes/usuarios.php';
  $u = new Usuarios;
  
  $u->conectar();
  $public = "";
 if (!isset($_SESSION['id_usuario'])) {
  // Destrói a sessão por segurança
  session_destroy();
  // Redireciona o visitante de volta para o inicio
  header("Location: index.php"); exit;
}
?>
  <main class="center container-xl">
    <div class="flex flex-coluna flex--row flex-start p-os">
      <nav class="cartao__container cartao-xxs">
        <!-- Editar perfil = opacity: 0-->
        <form id="perfil-edit" class="hidden" action="alterarperfil.php" method="POST">
          <div class="info-user mb-3 flex-items-center"> 
            <input id="js-file-uploader" onchange="userPicture(this);" name="profile-picture" type="file" accept="image/png, image/jpeg" />
            <img class=" mr-3 avatar col-2 flex-shrink-0" src=<?php echo '"'.$_SESSION ['foto_p'].'"'?>>
            <div class="">
              <label for="user_profile_name" class="input--label  mb-1">Nome</label>
              <input class="input width-full " id="user_profile_name" name="user_profile_name" value="<?php echo ''.$_SESSION ['nome'].''?>">
            </div>
          </div>
          <div class="flex flex-coluna">
            <label for="user_profile_bio" class="input--label  mb-1">Sobre</label>
            <textarea class="input  textarea" id="user_profile_bio" name="user_profile_bio" placeholder="Conte mais sobre você" aria-label="Add a bio" rows="3" data-input-max-length="160"><?php echo ''.$_SESSION ['sobre'].''?></textarea>
          </div>
          <div class="">
              <label for="" class="input--label  mb-1">Cidade</label>
              <input class="input width-full " id="cidade"  name="cidade" value="<?php echo ''.$_SESSION ['cidade'].''?>">
            </div>
          <div class="my-2 line1">
            <label class="checkbox--label ">
              <input type="checkbox" id="receber" name="receber" <?php if($_SESSION ['receber'] == "t"){ echo "checked";}?>> 
              Receber uma notificação por email quando um novo gráfico da minha área de interesse for postado.
            </label>
          </div>
          <div class="flex flex--row width-full">
            <button type="reset" id="btn-cancel" class="botao--container botao--secundario width-full mr-3 ml-3">Cancelar</button>  
            <button type="submit" id="btn-save" class="botao--container botao--primario mr-3 width-full">Salvar</button>  
          </div>
        </form> 
        <div id="perfil-noedit">
          <div class="info-user mb-3 flex-items-center d-block"> 
            <input id="js-file-uploader" class="hidden" name="profile-picture" type="file" accept="image/png, image/jpeg" />
            <img class=" mr-3 avatar col-2 flex-shrink-0" src="assets/img/publicacoes/modelo-atomico.png">
            <!--src=< ?php echo '"'.$_SESSION ['foto_p'].'"'?> -->
            <div class="vcartao-nome">
              <span class="vcard-fullname block"> <?php echo ''.$_SESSION ['nome'].''?></span>
              <span class="vcard-username block"><?php echo ''.$_SESSION ['email'].''?></span>
            </div>
          </div>
          <div>
            <p><span class="material-icons-outlined">info</span><?php echo ''.$_SESSION ['sobre'].''?></p>
          </div>
          <div class="flex flex-coluna">
              <ul class="my-2">
                <li> <spam class="material-icons-outlined">location_on </spam><?php echo ''.$_SESSION ['cidade'].''?></li> 
                <li> <span class="material-icons-outlined"> mail</span><?php echo ''.$_SESSION ['email'].''?></li>
            </ul>
            <button id="btn-edit" class="botao--container botao--secundario width-full"> Editar perfil </button>  
          </div>
        </div>
      </nav>
      <section class="cartao-xxl  cartao__container relative">
        <div class="cartao-header"> 
            <h2 class="container--titulo"> Resultados de filtro</h2>
            <div class="label--order">
              <label for="dropdow_order" > Ordenar por: </label>
              <select id="dropdow_order" class="dropdow--order">
                <option value=""> Populares</option>
                <option value=""> Novos</option>
                <option value=""> Antigos</option>
              </select>
            </div>
          </div>
        <form>
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
        </form>
        <div class="sem-conteudo" > 
          <?php
          if(empty($public)){
            echo "<spam> Não há publicações até o momento </spam>"; 
          }
          ?>          
        </div>
      </section>
    </div> 
  </main>
  <script src="js/atualizar.js"></script>
  <script src="js/profile.js"></script>
<?php
include ("rodape.php");
?>