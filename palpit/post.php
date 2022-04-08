<?php
 include ("cabecalho.php");
 require_once 'classes/usuarios.php';
 $u = new Usuarios;
 $u->conectar();

 $id_arquivo = $_GET['id_arquivo']; 

 $sql= $pdo->prepare("SELECT DISTINCT a.id_arquivo, a.titulo, a.foto_v, a.criado_arquivo,u.nome,u.foto_p,group_concat(distinct t.key_words) as tags,  group_concat(distinct d.nome_disciplina) as disciplinas, group_concat(distinct e.nivel) as escolaridade
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
?>
  <main  class="center container-xx" >
    <div class="p-os"> 
      <section class="cartao__container cartao-xl width-full">
        <div class="flex space-between">
          <div class="flex">
            <img src="<?php echo $dados_arquivo["foto_p"];?>" class="user-img" >
            <div class="flex flex-coluna ">
              <span class="user-name"> <?php echo $dados_arquivo["nome"];?> </span>
              <span class="post-date"> <?php echo $dados_arquivo["criado_arquivo"];?> </span>
            </div>
          </div>
          <button class="botao--container btn-download">
            <span class="material-icons-outlined">file_download </span> Download
          </button>
        </div>
        <h2 class="cartao-header container--titulo"> <?php echo $dados_arquivo["titulo"];?> </h2>
        <div>
          <span> <?php echo $dados_arquivo["disciplinas"];?> </span>
          <span> <?php echo $dados_arquivo["tags"];?> </span>
          <span> <?php echo $dados_arquivo["escolaridade"];?> </span>
        </div>
        <div class=" post-img border-bottom">
            <img src="<?php echo $dados_arquivo["foto_v"];?>" alt="">
        </div>
      </section>
    </div>
  </main>
<?php
  include ("rodape.php");
?>