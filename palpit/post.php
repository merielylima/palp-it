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
    <div class="p-os"> 
      <section class="cartao__container cartao-xl width-full">
          <div id="pp-del" class="popup-container">
            <div class="popup">
              <button class="btn-close" type="button" onclick="closepp(this);"> x </button>
              <span class="pp-title">Atenção!</span>
              <span> Esta ação não poderá ser desfeita. Tem certeza que deseja apagar essa publicação?</span>
              <div class="btn-popup">
                  <?php echo" <a href='deletearquivo.php?id_arquivo=$id_arquivo' class='botao--container botao--primario width-full'>Apagar</a>"; ?>
                  <span onclick="closepp(this);" class="botao--container botao--secundario width-full noborder" >Cancelar</span>
                  
              </div>
            </div>
          </div>
          <div id="pp-dwn" class='popup-container'>
            <div class="popup">
              <span class="pp-title">Não desista agora! </span>
              <span> É necessário estar logado para concluir esta etapa.</span> 
              <button class="btn-close" type="button" onclick="clspp(this);"> x </button>
                  <div class='btn-popup'>
                    <a href='login.php' class='botao--container botao--primario width-full'> 
                      Entrar
                    </a>
                    <a href='cadastro.php' class='botao--container botao--secundario width-full noborder'>
                      Cadastrar
                    </a>
                  </div>
            </div>
          </div>
        <div class="cartao-header my-0 reverse">
          <div class="flex">
            <a href="perfil.php" class="link-container avt-container avt-post">
              <div class="avt-content">
                <img id="js-file-uploader" class="avt" src="<?php echo $dados_arquivo["foto_p"];?>" class="user-img" >
              </div>
            </a>  
            <div class="flex flex-coluna bloco-inf">
              <a href="perfil.php" class="link-container item-user"> <?php echo $dados_arquivo["nome"];?> </a>
              <span class="post-data"> <?php echo $dados_arquivo["criado_arquivo"];?> </span>
            </div>
          </div>
          <div class="btn-order">
            <?php
              if($f->logado() && $dados_arquivo["id_usuario_fk"] == $_SESSION['id_usuario']):
                echo "<button class='botao--container btn-excluir' type='button' onclick='openpp(this);'>
                <span class='material-icons-outlined'>delete </span> Excluir
              </button>";
              endif;
            ?>
            <?php
              if($f->logado() && $dados_arquivo["id_usuario_fk"] == $_SESSION['id_usuario']):
                echo "<a href='downloadarquivo.php?id_arquivo=$id_arquivo' class='botao--container btn-download'>
                  <span class='material-icons-outlined'>file_download </span> Download
              </a>";
              else:
                echo "<button class='botao--container btn-download' type='button' onclick='opnpp(this);'>
                <span class='material-icons-outlined'>file_download </span> Download
                </button>";
              endif; 
            ?>
          </div>
        </div>
        <div class="flex flex-coluna border-bottom my-0">
          <h2 class="pt-1 container--titulo"> <?php echo $dados_arquivo["titulo"];?> </h2>
          <div>
          <?php 
            $disciplina=$dados_arquivo["disciplinas"]; 
            $array_d = explode(",",$disciplina);
            $n_array = count($array_d);
            for($i=0 ; $i < $n_array ; $i++ ){
              echo "<span class='disciplina'> $array_d[$i] </span>";
            }
            ?>
          </div>
          <div>
            <span class="tags" > <?php $tag=$dados_arquivo["tags"]; $new = preg_replace('/[\,]+/'," #",$tag); echo "#".$new;?> </span>
          </div>
          <div>
            <span class="msg-alternativa"> <?php echo $dados_arquivo["escolaridade"];?> </span>
          </div>
          <div class=" post-img_container">
            <div class="post-img_content">
              <img class=" post-img" src="<?php echo $dados_arquivo["foto_v"];?>" alt="Foto visual">
            </div>
          </div>
          <span class="mb-2 post-descricao"> <?php echo $dados_arquivo["descricao"];?></span>
        </div>
      </section>
    </div>
  </main>
  <script src="js/post.js"></script>
<?php
  include ("rodape.php");
?>