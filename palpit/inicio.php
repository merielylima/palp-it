<?php
  $page_atual = 1;//pagina selecionada
  include ("cabecalho.php");
  require_once 'classes/usuarios.php';
  $u = new Usuarios;
  $u->conectar();
  $public = "";


  function check_titulo ($pdo, $disciplina, $fundamental1, $fundamental2, $medio, $superior, $busca) {
      $busca_titulo = "";
      $busca_tag = "";

      foreach(explode("\n",trim($busca)) as $value){
         if($busca_titulo == ""){
          $busca_titulo = $busca_titulo." a.radical_titulo LIKE '%$value%'";
         }else{
          $busca_titulo = $busca_titulo." AND a.radical_titulo LIKE '%$value%'";
         }
         if($busca_tag != ""){
          $busca_tag = $busca_tag." AND a.radical_tag LIKE '%$value%'";
         }else{
          $busca_tag = $busca_tag." a.radical_tag LIKE '%$value%'";
         }
         
      }

      $nivel="";
      $f1="'Fundamental I'";
      $f2="'Fundamental II'";
      $m="'Médio'";
      $s="'Superior'";
      $querynivel="";

      if($fundamental1==true) $nivel= "e.nivel=$f1";

      if($fundamental2==true){
        if($nivel=="") $nivel="e.nivel=$f2";
        else $nivel=$nivel." OR "."e.nivel=$f2";
      }

      if($medio==true){
        if($nivel=="") $nivel="e.nivel=$m";
        else $nivel=$nivel." OR "."e.nivel=$m";
      }

      if($superior==true){
        if($nivel=="") $nivel="e.nivel=$s";
        else $nivel=$nivel." OR "."e.nivel=$s";
      }

      if($nivel=="") $querynivel=$nivel;
      else $querynivel="AND ($nivel)";

      if($disciplina != 'Todas') $querydisciplina = "AND d.nome_disciplina = '$disciplina'";
      else $querydisciplina = "";

      if($busca == "") $querybusca="";
      else $querybusca = " AND ($busca_titulo OR $busca_tag)";

      $sql= $pdo->prepare("SELECT DISTINCT a.id_arquivo, a.titulo, a.foto_v,a.criado_arquivo,u.nome,u.foto_p
      FROM arquivo a
      INNER JOIN usuario u ON u.id_usuario = a.id_usuario_fk
      INNER JOIN assoc_arquivo aa ON aa.id_arquivo_fk=a.id_arquivo
      INNER JOIN assoc_ed ae ON ae.id_assoc_ed=aa.id_assoc_ed_fk
      INNER JOIN disciplina d ON d.id_disciplina=ae.id_disciplina_fk
      INNER JOIN escolaridade e ON e.id_escolaridade=ae.id_escolaridade_fk
      WHERE
        a.status=0
        $querynivel
        $querydisciplina
        $querybusca"
      );

      $sql->execute();
      return $sql->fetchAll (PDO::FETCH_ASSOC);
  }
  
?>  
  <main  class="center container-xl" >
    <div class=" flex flex-coluna flex--row flex-start p-os"> 
    <nav class=" cartao__container cartao-xxs">
        <form  action="inicio.php"  method="POST">
          <div class="">
            <label for="p_chave" class="input--label">Palavras-chave</label>
            <input name="p_chave" id="p_chave"  type="search" placeholder="Pesquisar" class=" mt-1 width-full input">
          </div>
          <div class="mt-2">
            <label for = "disciplina" class="input--label">Disciplina</label>
            <select name="disciplina" id="disciplina" class=" mt-1 option input width-full">
            <?php
              $getdisciplina = $pdo->prepare("SELECT * FROM disciplina ORDER BY id_disciplina");
              $getdisciplina->execute();
              while($rows = $getdisciplina->fetch(PDO::FETCH_ASSOC)){
                $nome_disciplina = $rows['nome_disciplina'];
                $disciplina_id = $rows['id_disciplina'];
                echo "<option value='$nome_disciplina'>$nome_disciplina</option>";
              }
            ?>         
            </select>
          </div>
          <div class="mt-2 flex flex-coluna">
            <p class="input--label mb-1">Grau de escolaridade</p>
            <label class="checkbox--label ">
              <input type="checkbox" name="nivel1"> Ensino Fundamental I
            </label>
            <label class="checkbox--label">
              <input type="checkbox" name="nivel2"> Ensino Fundamental II
            </label>
            <label class="checkbox--label">
              <input type="checkbox" name="nivel3"> Ensino Médio
            </label>
            <label class="checkbox--label">
              <input type="checkbox" name="nivel4"> Ensino Superior
            </label>
          </div>
          <button class="botao--container botao--primario width-full"><span class="material-symbols-rounded">search</span> Pesquisar </button>
        </form>
      </nav>
      <section class="cartao-xxl cartao__container">
          <div class="cartao-header"> 
            <h2 class="container--titulo"> Feed de publicações</h2>
            <div class="label--order">
              <label for="dropdow_order" > Ordenar por: </label>
              <select id="dropdow_order" class="dropdow--order">
                <option value="order1"> Novos</option>
                <option value="order2"> Antigos</option>
                <option value="order3"> Popuares</option>
              </select>
            </div>
          </div>
        <ol class="flex flex-wrap mb-4">
          <?php
            if(isset($_POST['p_chave']) || isset($_POST['nivel1']) || isset($_POST['nivel2']) || isset($_POST['nivel3']) || isset($_POST['nivel4'])){
              //recuperação das informações formulario
              $busca = addslashes($_POST['p_chave']);
              $disciplina = addslashes($_POST['disciplina']);
              $fundamental1 = addslashes(isset($_POST['nivel1'])) ? true : null;
              $fundamental2 = addslashes(isset($_POST['nivel2'])) ? true : null;
              $medio = addslashes(isset($_POST['nivel3'])) ? true : null;
              $superior = addslashes(isset($_POST['nivel4'])) ? true : null;

              $newbusca = preg_replace('/[^A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ\-\'\s]+/'," ",$busca);
		      $newbusca2 = preg_replace('/\s{1,}/'," ",$newbusca);
              $busca = $u -> geraradical ($newbusca2);

              $lista = check_titulo ($pdo, $disciplina, $fundamental1, $fundamental2, $medio, $superior, $busca);
            }else{
              $sql= $pdo->prepare("SELECT a.id_arquivo, a.titulo, a.foto_v, a.criado_arquivo,u.nome,u.foto_p FROM arquivo a,usuario u WHERE a.status = 0 AND u.id_usuario = a.id_usuario_fk ORDER BY id_arquivo DESC;");
              $sql->execute();
              $lista = $sql->fetchAll (PDO::FETCH_ASSOC);
            }
            for ($i = 0; $i < count ($lista); $i ++) {
                $l = $lista [$i];
            ?>
              <li class="cartao__container--item">
                <a href="post.php?id_arquivo=<?php echo $l["id_arquivo"];?>" class=" hoverzinho flex flex-coluna">
                  <div class="img-container">
                    <div class="avt-content">
                      <img class="img" src=<?php echo $l["foto_v"];?>>
                    </div> 
                  </div>
                  <span class="item-titulo "><?php echo $l["titulo"];?></span>
                </a>
                  
                <a href="perfil.php" class="link-container flex flex-items-center "> 
                  <div class="avt-container avt-cab">
                      <div class="avt-content">
                          <img class="avt" src=<?php echo $l["foto_p"];?> alt="Foto de perfil">
                      </div>
                  </div> 
                  <span class="item-user"><?php echo $l["nome"];?></span>
                  <span class="hidden"><?php echo $l["criado_arquivo"];?></span>
                </a> 
              </li>
            <?php
          }
          $public = $lista;
          ?>
        </ol>
        <div class="sem-conteudo" >
          <?php
          if(empty($public)){
            echo "<span> Não há publicações para os critérios definidos </span>"; 
          }
          ?>
        </div>
      </section>
    </div>
  </main>
  <?php
    include ("rodape.php");
  ?>  
