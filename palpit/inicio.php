<?php
  $page_atual = 1;//pagina selecionada
  include ("cabecalho.php");
  require_once 'classes/usuarios.php';
  $u = new Usuarios;
  $u->conectar();
  $public = "";
?>  
  <main  class="center container-xl" >
    <div class=" flex flex-coluna flex--row flex-start p-os"> 
      <nav class=" cartao__container cartao-xxs ">
        <form  action="inicio.php"  method="POST">
          <div class="mt-2">
            <label for="p_chave" class="input--label">Palavras-chave</label>
            <input name="p_chave" id="p_chave"  type="search" placeholder="Pesquisar" class=" mt-1 width-full input">
          </div>
          <div class="mt-2">
            <label for = "disciplina" class="input--label">Disciplina</label>
            <select name="disciplina" id="disciplina" class=" option input width-full">
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
          <button class="botao--container botao--primario width-full">Pesquisar </button>
        </form>
      </nav>
      <section class=" cartao-xxl cartao__container ">
          <div class="cartao-header"> 
            <h2 class="container--titulo"> Resultados de filtro</h2>
            <div class="label--order">
              <label for="dropdow_order" > Ordenar por: </label>
              <select id="dropdow_order" class="dropdow--order">
                <option value="order1"> Novos</option>
                <option value="order2"> Antigos</option>
                <option value="order3"> Popuares</option>
              </select>
            </div>
          </div>
        <ol class="flex flex-wrap">
          <?php
            if(isset($_POST['p_chave']) || isset($_POST['nivel1']) || isset($_POST['nivel2']) || isset($_POST['nivel3']) || isset($_POST['nivel4'])){
              //recuperação das informações formulario
              $busca = addslashes($_POST['p_chave']);
              $disciplina = addslashes($_POST['disciplina']);
              $fundamental1 = addslashes(isset($_POST['nivel1'])) ? true : null;
              $fundamental2 = addslashes(isset($_POST['nivel2'])) ? true : null;
              $medio = addslashes(isset($_POST['nivel3'])) ? true : null;
              $superior = addslashes(isset($_POST['nivel4'])) ? true : null;

              $nivel="";
              $f1="'Fundamental I'";
              $f2="'Fundamental II'";
              $m="'Médio'";
              $s="'Superior'";
              $querynivel="";

              if($fundamental1==true){
                $nivel= "e.nivel=$f1";
              }

              if($fundamental2==true){
                if($nivel==""){
                  $nivel="e.nivel=$f2";
                }else{				
                  $nivel=$nivel." OR "."e.nivel=$f2";
                };
              }

              if($medio==true){
                if($nivel==""){
                  $nivel="e.nivel=$m";
                }else{				
                  $nivel=$nivel." OR "."e.nivel=$m";
                };
              }

              if($superior==true){
                if($nivel==""){
                  $nivel="e.nivel=$s";
                }else{				
                  $nivel=$nivel." OR "."e.nivel=$s";
                };
              }

              if($nivel==""){
                $querynivel=$nivel;
              }else{
                $querynivel="AND ($nivel)";
              };

              if($disciplina != 'Todas'){
                $querydisciplina = "AND d.nome_disciplina = '$disciplina'";
              }else{
                $querydisciplina = "";
              };

              if($busca == ""){
                $querybusca="";
              }else{
                $querybusca="AND a.titulo LIKE '%$busca%' OR t.key_words LIKE '%$busca%'";
              };

              $sql= $pdo->prepare("SELECT DISTINCT a.id_arquivo, a.titulo, a.foto_v,u.nome,u.foto_p
              FROM arquivo a
              INNER JOIN usuario u ON u.id_usuario = a.id_usuario_fk
              INNER JOIN tag t ON t.id_arquivo_fk=a.id_arquivo
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

              //$sql->bindValue(":b", $busca);
              //$sql->bindValue(":d", $disciplina);
              $sql->execute();

            }else{
              $sql= $pdo->prepare("SELECT a.id_arquivo, a.titulo, a.foto_v,u.nome,u.foto_p FROM arquivo a,usuario u WHERE a.status = 0 AND u.id_usuario = a.id_usuario_fk ORDER BY id_arquivo DESC;");
              $sql->execute();
            }
            while($lista = $sql->fetch(PDO::FETCH_ASSOC)):
            ?>
              <li class="cartao__container--item">
                <a href="post.php?id_arquivo=<?php echo $lista["id_arquivo"];?>" class="flex flex-coluna">
                  <div class="item-img">
                    <img src=<?php echo $lista["foto_v"];?>>
                  </div>
                  <span class="item-titulo"><?php echo $lista["titulo"];?></span>
                </a>
                <div class="link-container flex flex-items-center "> 
                  <img src=<?php echo $lista["foto_p"];?> alt="Foto de perfil">
                  <span class="item-user"><?php echo $lista["nome"];?></span>
                </div> 
              </li>
            <?php
            $public = $lista;
            endwhile;
          ?>
        </ol>
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
  <?php
    include ("rodape.php");
  ?>  
