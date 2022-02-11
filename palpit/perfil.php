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
  <main class="center container-xl">
    <div class="flex flex--coluna flex--row flex-start p-os">
      <nav class="cartao--container cartao-xxs">
        <!-- Editar perfil = opacity: 0-->
        <form class="hidden" action="alterarperfil.php" method="POST">
          <div class="info-user mb-3 flex-items-center "> 
            <input id="js-file-uploader" class="hidden" name="profile-picture" type="file" accept="image/png, image/jpeg" />
            <img class=" mr-3 avatar col-2 flex-shrink-0" src=<?php echo '"'.$_SESSION ['foto_p'].'"'?>>
            <div class="">
              <label for="user_profile_name" class="input--label  mb-1">Nome</label>
              <input class="input width-full input-envio" id="user_profile_name"  aria-label="Name" name="user_profile_name" value="">
            </div>
          </div>
          <div class="flex flex--coluna">
            <label for="user_profile_bio" class="input--label  mb-1">Sobre</label>
            <textarea class="input input-envio textarea" id="user_profile_bio" name="user_profile_bio" placeholder="Conte mais sobre você" aria-label="Add a bio" rows="3" data-input-max-length="160"></textarea>
          </div>
          <div class="">
              <label for="" class="input--label  mb-1">Cidade</label>
              <input class="input width-full input-envio" id="cidade"  aria-label="" name="cidade" value="">
            </div>
          <div class="my-2 line1">
            <label class="checkbox--label ">
              <input type="checkbox" name="receber" checked> 
              Receber uma notificação por email quando um novo gráfico da minha área de interesse for postado.
            </label>
          </div>
          <div class="flex flex--row width-full">
            <button id="btn-cancel" class="botao--container botao--secundario width-full mr-3 ml-3">Cancelar</button>  
            <button id="btn-save"class="botao--container botao--primario mr-3 width-full">Salvar</button>  
          </div>
        </form> 
        <div class="left-side--active">
          <div class="info-user mb-3 flex-items-center d-block"> 
            <input id="js-file-uploader" class="hidden" name="profile-picture" type="file" accept="image/png, image/jpeg" />
            <img class=" mr-3 avatar col-2 flex-shrink-0" src=<?php echo '"'.$_SESSION ['foto_p'].'"'?>>
            <div class="vcartao-nome">
              <span class="vcard-fullname block"> <?php echo ''.$_SESSION ['nome'].''?></span>
              <span class="vcard-username block"><?php echo ''.$_SESSION ['email'].''?></span>
            </div>
          </div>
          <div class="flex flex--coluna">
              <ul class="my-2">
              <li> <spam class="material-icons">location_on </spam><?php echo ''.$_SESSION ['cidade'].''?></li> 
              <li> <span class="material-icons"> mail</span><?php echo ''.$_SESSION ['email'].''?></li>
            </ul>
            <button id="btn-edit" class="botao--container botao--secundario width-full"> Editar perfil </button>  
          </div>
        </div>
      </nav>
      <section class="cartao-xxl  cartao--container relative">
        <h2 class="container--titulo"> Mais populares</h2>
        <div class="flex flex--centro ordenar input-envio option input flex-items-center ">
          <label class="">Ordenar por: </label>
          <select name="" id="" class="a">
            <option value=""> Populares</option>
            <option value=""> Novos</option>
            <option value=""> Antigos</option>
          </select>
        </div>
        <div class="sem-conteudo" > 
          <spam >Não há publicações até o momento</spam>  <!--  Se publicação > 1,remove classe(.sem conteudo) -->          
        </div>
        <form>
          <ol class="flex flex--wrap">
            <?php 
              $usuario = $_SESSION['id_usuario'];
              $sql= $pdo->prepare("SELECT a.id_arquivo, a.titulo, a.foto_v FROM arquivo a
              INNER JOIN usuario u ON u.id_usuario=a.id_usuario_fk WHERE u.id_usuario LIKE '$usuario'");
              $sql->execute();
              while($lista = $sql->fetch(PDO::FETCH_ASSOC)):
            ?>
              <li class="px-2 item-post">
                <div class=" flex flex--coluna flex-items-center ">
                  <img class="width-full" src=<?php echo $lista["foto_v"];?>>
                  <span class="block"><?php echo $lista["titulo"];?></span>
                </div>
              </li>
            <?php
              endwhile;
            ?>
          </ol>
        </form>

      </section>
    </div> 
  </main>
  <script src="js/atualizar.js"></script>

<?php
include ("rodape.php");
?>