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
      <nav class="cartao__container cartao-xxs mr-card">
        <!-- Editar perfil = opacity: 0-->
        <form id="perfil-edit" class="hidden" action="alterarperfil.php" enctype='multipart/form-data' method="POST">
            <div class="avt-container">
              <label for="avatar">
                <div class="avt-content avt-hover_container">
                  <span class="avt-hover"> Atualizar <br/> foto de perfil</span>
                  <img id="js-file-uploader" class="avt" src=<?php echo '"'.$_SESSION ['foto_p'].'"'?>>
                </div> 
              </label>
              <input id="avatar" multiple accept=".jpg, .jpeg, .png" onchange="userPicture(this);" name="avatar" type="file" class=" input--img input-hidden"/>   
            </div>

          <div class="mb-1">
              <label for="user_profile_name" class="input--label  ">Nome</label>
              <input class="input width-full " id="user_profile_name" name="user_profile_name" value="<?php echo ''.$_SESSION ['nome'].''?>">
            </div>
          <div class="mb-1 flex flex-coluna">
            <label for="user_profile_bio" class="input--label  ">Sobre</label>
            <textarea class="input textarea" id="user_profile_bio" name="user_profile_bio" placeholder="Conte mais sobre você..."><?php echo ''.$_SESSION ['sobre'].''?></textarea>
          </div>
          <div class=" mb-1">
              <label for="" class="input--label ">Cidade</label>
              <input class="input width-full " id="cidade"  name="cidade" placeholder="Onde você mora?" value="<?php echo ''.$_SESSION ['cidade'].''?>">
          </div>
          <div> 
            <label id="area" class="input--label">Área de interesse</label>
            <select class="option input input-full" name="area">
              <?php
                $id_usuario = $_SESSION['id_usuario'];
                $sel_area = $pdo->prepare("SELECT DISTINCT asa.id_assoc_area, ar.id_area
                FROM assoc_area asa
                INNER JOIN usuario u ON u.id_usuario = asa.id_usuario_fk
                INNER JOIN area ar ON ar.id_area = asa.id_area_fk
                WHERE
                  u.id_usuario=$id_usuario");
                $sel_area->execute();
                $resultado = $sel_area->fetchAll(PDO::FETCH_OBJ);
                $id_area_fk =(int)$resultado[0]->id_area;
  				      $getarea = $pdo->prepare("SELECT * FROM area ORDER BY id_area");
                $getarea->execute();
                while($rows = $getarea->fetch(PDO::FETCH_ASSOC)){
                $nome_area = $rows['nome_area'];
                $area_id = $rows['id_area'];
                  if($area_id != $id_area_fk){
                    echo "<option value='$area_id'>$nome_area</option>";
                  }else{
                    echo "<option value='$area_id' selected > $nome_area</option>";
                  }
                }
              ?>
            </select>
            <label class="checkbox--label">
              <input type="checkbox" id="receber" name="receber" <?php if($_SESSION ['receber'] == "t"){ echo "checked";}?>> 
              Receber uma notificação por email quando um novo gráfico da minha área de interesse for postado.
            </label>
          </div>
          <div class="flex flex--row width-full">
            <button type="reset" id="btn-cancel" class="botao--container botao--secundario width-full mr-2 ">Cancelar</button>  
            <button type="submit" id="btn-save" class="botao--container botao--primario  width-full">Salvar</button>  
          </div>
        </form> 
        <div id="perfil-noedit">
          <div class="info-user mb-3 d-block info-resp "> 
            <div class="avt-container avt-resp">
              <div class="avt-content">
                <img id="js-file-uploader" class="avt" src=<?php echo '"'.$_SESSION ['foto_p'].'"'?>>
              </div> 
            </div>

            <div class="vcartao-nome">
              <span class="vcard-fullname block"> <?php echo ''.$_SESSION ['nome'].''?></span>
              <span class="vcard-username block"> <?php echo ''.$_SESSION ['email'].''?></span>
            </div>
          </div>

          <div class="flex flex-coluna">
            <ul class="mt-2">
              <li class="info-content">
              <span class="material-symbols-rounded">info</span>
                <?php
                if($_SESSION ['sobre'] == ""):
                  echo "<span class='msg-alternativa'> Conte mais sobre você... </span>";
                else:
                  $sobre_atual= $_SESSION ['sobre'];
                  echo "<span>$sobre_atual</span>";
                endif; 
                ?>
              </li>
              <li class="info-content">
              <span class="material-symbols-rounded">location_on</span>
                <?php
                if($_SESSION ['cidade'] == ""):
                  echo "<span class='msg-alternativa'> Onde você mora?</span>";
                else:
                  $cidade_atual = $_SESSION ['cidade'];
                  echo "<span>$cidade_atual</span>";
                endif; 
                ?>               
              </li> 
              <li class="info-content">
              <span class="material-symbols-rounded">mail</span>
                <span><?php echo ''.$_SESSION ['email'].''?></span>  
              </li>
            </ul>
            <button id="btn-edit" class="botao--container botao--secundario width-full"> Editar perfil </button>  
          </div>
        </div>
      </nav>
      <section class="cartao-xxl  cartao__container relative">
        <div class="cartao-header"> 
            <h2 class="container--titulo"> Destaques</h2>
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
          <ol class="flex flex-wrap mb-4">
            <?php 
              $usuario = $_SESSION['id_usuario'];
              $sql= $pdo->prepare("SELECT a.id_arquivo, a.titulo, a.foto_v FROM arquivo a
              INNER JOIN usuario u ON u.id_usuario=a.id_usuario_fk WHERE a.status=0 AND u.id_usuario LIKE '$usuario'");
              $sql->execute();
              while($lista = $sql->fetch(PDO::FETCH_ASSOC)):
            ?>
              <li class="cartao__container--item">
                <a href="post.php?id_arquivo=<?php echo $lista["id_arquivo"];?>" class="flex flex-coluna">
                  <div class="img-container">
                    <div class="avt-content">
                      <img class="img" src=<?php echo $lista["foto_v"];?>>
                    </div> 
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
        <div class="show-more">
        <?php
          if($public > 1){
            echo "<a href='contribuicoes.php' class='botao--container link-color btn-show-more link-container'> Mostrar mais</a>"; 
          }
          ?>     
        </div>
        <div class="sem-conteudo" > 
          <?php
          if(empty($public)){
            
            echo "
            <div> 
                <a href='envio.php' class='center botao--container botao--terciario btn-contribuicao mb-2'> 
                <span class='material-icons-outlined'>add</span> Adicionar</a>
              </div>
              <span> Clique para adicionar sua primeira contribuição </span>"; 
          }
          ?>          
        </div>
      </section>
    </div> 
  </main>
  <script src="js/profile.js"></script>
<?php
include ("rodape.php");
?>