<?php
 include ("cabecalho.php");
 require_once 'classes/usuarios.php';
 $u = new Usuarios;
 $u->conectar();

 $id_arquivo = $_GET['id_arquivo'];

 $sql= $pdo->prepare("SELECT DISTINCT a.id_arquivo, a.titulo, a.foto_v, a.descricao, a.criado_arquivo,a.id_usuario_fk,u.nome,u.foto_p,group_concat(distinct t.key_words ORDER BY t.id_tag) as tags,  group_concat(distinct d.nome_disciplina) as disciplinas, group_concat(distinct e.nivel) as escolaridade
    FROM arquivo a
    INNER JOIN usuario u ON u.id_usuario = a.id_usuario_fk
    INNER JOIN tag t ON t.id_arquivo_fk=a.id_arquivo
    INNER JOIN assoc_arquivo aa ON aa.id_arquivo_fk=a.id_arquivo
    INNER JOIN assoc_ed ae ON ae.id_assoc_ed=aa.id_assoc_ed_fk
    INNER JOIN disciplina d ON d.id_disciplina=ae.id_disciplina_fk
    INNER JOIN escolaridade e ON e.id_escolaridade=ae.id_escolaridade_fk
    WHERE
      a.id_arquivo = '$id_arquivo'"
    );
    $sql->execute();
    $dados_arquivo = $sql->fetch(PDO::FETCH_ASSOC);

    $soma_acesso=$pdo->prepare("UPDATE arquivo a SET a.q_acesso = a.q_acesso+1 WHERE id_arquivo=$id_arquivo");
    $soma_acesso->execute();
?>
  <main  class="center post-container" >
    <div>
      <span></span>
    </div>
    <div class="flex  collumn-reverse flex--row flex-start p-os" > 
      <section class="cartao__container cartao-xl">
        <div id="pp-del" class='fullscreen-container'>
          <div class="popdiv">
            <div class="popup">
              <button class="btn-close" type="button" onclick="closepp(this);"> x </button>
              <span class="pp-title">Atenção!</span>
              <span> Esta ação não poderá ser desfeita. Tem certeza que deseja apagar essa publicação?</span>
              <div class="btn-popup">
                <?php echo" <a href='deletearquivo.php?id_arquivo=$id_arquivo' class='botao--container botao--primario width-full'>Apagar</a>"; ?>
                <span onclick="closepp(this);" class="botao--container botao--secundario width-full " >Cancelar</span>
              </div>
            </div>
          </div>
        </div>
        <div id="pp-dwn" class='fullscreen-container'>
          <div class="popdiv">
            <div class="popup">
              <span class="pp-title">Não desista agora! </span>
              <span> É necessário estar logado para concluir esta etapa.</span> 
              <button class="btn-close" type="button" onclick="clspp(this);"> x </button>
              <div class='btn-popup'>
                <a href='login.php' class='botao--container botao--primario width-full'> 
                  Entrar
                </a>
                <a href='cadastro.php' class='botao--container botao--secundario width-full '>
                  Cadastrar
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="cartao-header my-0">
          <div class="flex">
            <a href="perfil.php" class="link-container avt-container avt-post">
              <div class="avt-content">
                <img id="js-file-uploader" src="<?php echo $dados_arquivo["foto_p"];?>" class="avt user-img" >
              </div>
            </a>  
            <div class="flex flex-coluna bloco-inf">
              <a href="perfil.php" class="link-container item-user"> <?php echo $dados_arquivo["nome"];?> </a>
              <span class="post-data"> <?php echo $dados_arquivo["criado_arquivo"];?> </span>
            </div>
          </div>
          <?php
          if($f->logado() && $dados_arquivo["id_usuario_fk"] == $_SESSION['id_usuario']):
                echo"<div>
            <button onclick='options();' class='material-symbols-rounded options-btn'>more_horiz</button>
            <div id='options' class='options-container'> 
                <button class='caixa-item' type='button' onclick='openpp(this);'> Excluir </button>
                <span class='caixa-item'>Editar</span>
            </div>
          </div>";
          endif;
          ?> 
        </div>
        <div class="flex flex-coluna">
          <h3 class="pt-1 post-titulo"> <?php echo $dados_arquivo["titulo"];?> </h3>
          <div>
            <?php 
              $tag=$dados_arquivo["tags"]; 
              $array_t = explode(",",$tag);
              $t_array = count($array_t);
              for($i=0 ; $i < $t_array ; $i++ ){
                echo "<span class='tags'>"." #".$array_t[$i]."</span>";
              }
            ?>
            
          </div>
          <div class="mb-2">
            <div id="read-more--container" class="">
              <p class="read-more"> <?php echo $dados_arquivo["descricao"];?> </p>
              <button id="read-more" class="btn-read">Ver mais</button>
            </div>
            <div id="read-less--container" class="hidden">
              <span  class="read-less"> <?php echo $dados_arquivo["descricao"];?> </span>
              <button id="read-less" class="btn-read">Ver menos</button>
            </div>
          </div>
          <div class=" post-img_container">
            <div class="post-img_content">
              <img class=" post-img" src="<?php echo $dados_arquivo["foto_v"];?>" alt="Foto visual">
            </div>
          </div>
          
        </div>
        <div class="post-functions">
          <div class="material-icons functions-items"> 
            <span class="material-symbols-rounded">grade</span>
            <span class="mt-1">Favoritar</span>
          </div>
          <div class="material-icons functions-items">
            <span class="material-symbols-rounded eye">forum</span>
            <span class="mt-1">Comentar</span>
          </div>
        </div>
      </section>
      <div class="cartao__container cartao-post ">
        <div>
          <div class="informacao-post">
          <h2 class="pt-1 post-titulo"> Sobre </h2>
          <div class="mt-1">
            <span class="semi-bold">Título:   </span>
            <span> <?php echo $dados_arquivo["titulo"];?></span>
          </div>
          <div class="mt-1">
            <span class="semi-bold ">Disciplina:   </span>
            <span>           <?php 
              $disciplina=$dados_arquivo["disciplinas"]; 
              $array_d = explode(",",$disciplina);
              $n_array = count($array_d);
              for($i=0 ; $i < $n_array ; $i++ ){
                echo "<span> $array_d[$i]".","." </span>";
              }
            ?></span>
            </div>
            <div class="mt-1">
              <span class="semi-bold">Graus de escolaridade:  </span>
              <span> <?php 
                $esc = $dados_arquivo["escolaridade"]; 
                $array_e = explode(",",$esc); 
                $c_array = count($array_e); 
                for($i=0 ; $i < $c_array ; $i++ ){
                echo "<span> $array_e[$i]".","."</span>";}
                ?> 
              </span>
            </div>
            <div>
              <div class="material-icons">
                  <span class="material-symbols-rounded">grade</span>  
                  <span class="mr-1 mt-1">5 </span> 
                  <span class="mt-1"> Favoritos</span>
              </div>
              <div class="material-icons">
                <span class="material-symbols-rounded">download</span> 
                <span class="mr-1 "> 16 </span> 
                <span>Downloads</span>
              </div>
              <div class="material-icons" >
                <span class="material-symbols-rounded eye">visibility</span>
                <span class="mr-1 " > 100 </span>
                <span>Visualizações</span>
              </div>
            </div>
            

          </div>
          <?php
            if($f->logado() && $dados_arquivo["id_usuario_fk"] == $_SESSION['id_usuario']):
              echo "<a href='downloadarquivo.php?id_arquivo=$id_arquivo' class='botao--container botao--secundario width-full semi-bold '>
                <span class='material-symbols-rounded'>download </span> Download
            </a>";
            else:
              echo "<button class='botao--container botao--secundario width-full semi-bold ' type='button' onclick='opnpp(this);'>
              <span class='material-symbols-rounded'>download </span> Download
            </button>";
            endif; 
          ?>
        </div>
      </div>
    </div>
  </main>
  <script src="js/post.js"></script>
<?php
  include ("rodape.php");
?>