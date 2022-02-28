<?php
  $page_atual = 1;//pagina selecionada
  include ("cabecalho.php");
  require_once 'classes/usuarios.php';
  $u = new Usuarios;
  $u->conectar();
?>  
  <main  class="center container-xl" >
    <div class=" flex flex-coluna flex--row flex-start p-os"> 
      <nav class=" cartao__container cartao-xxs ">
        <form  action="index.php"  method="POST">
          <div class="mt-2">
            <label for="p_chave" class="input--label">Palavras-chave</label>
            <input name = "p_chave" id="p_chave"  type="search" placeholder="Pesquisar" class=" mt-1 width-full input">
          </div>
          <div class="mt-2">
            <label for = "disciplina" class="input--label">Disciplina</label>
            <select name="disciplina" id="disciplina" class=" option input width-full">
              <option value="Todas">Todas</option>
              <option value="Física">Física</option>
              <option value="Química">Química</option>
              <option value="Biologia">Biologia</option>
              <option value="Geografia">Geografia</option>
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
                <option value=""> Populares</option>
                <option value=""> Novos</option>
                <option value=""> Antigos</option>
              </select>
            </div>
          </div>
          <div class="sem-conteudo" > 
            <spam >Não há publicações até o momento</spam>  <!--  Se publicação > 1,remove classe(.sem conteudo) -->          
          </div>
        <ol class="flex flex-wrap">
          <?php
            if(isset($_POST['p_chave']) && isset($_POST['disciplina']) || isset($_POST['nivel1']) || isset($_POST['nivel2']) || isset($_POST['nivel3'])){
              //recuperação das informações formulario
              $busca = addslashes($_POST['p_chave']);
              $disciplina = addslashes($_POST['disciplina']);
              $fundamental1 = addslashes(isset($_POST['nivel1'])) ? true : null;
              $fundamental2 = addslashes(isset($_POST['nivel2'])) ? true : null;
              $medio = addslashes(isset($_POST['nivel3'])) ? true : null;

              $nivel="";
              $f1="'Fundamental I'";
              $f2="'Fundamental II'";
              $m="'Médio'";
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

              if($nivel!=""){
                $querynivel="AND ($nivel)";
              };

              $sql= $pdo->prepare("SELECT DISTINCT a.id_arquivo, a.titulo, a.foto_v
              FROM arquivo a
              INNER JOIN tag t ON t.id_arquivo_fk=a.id_arquivo
              INNER JOIN assoc_arquivo aa ON aa.id_arquivo_fk=a.id_arquivo
              INNER JOIN assoc_ed ae ON ae.id_assoc_ed=aa.id_assoc_ed_fk
              INNER JOIN disciplina d ON d.id_disciplina=ae.id_disciplina_fk
              INNER JOIN escolaridade e ON e.id_escolaridade=ae.id_escolaridade_fk
              WHERE 
                t.key_words LIKE '%$busca%'
                AND d.nome_disciplina = '$disciplina'
                $querynivel"
              );

              //$sql->bindValue(":b", $busca);
              //$sql->bindValue(":d", $disciplina);
              $sql->execute();

            }else{
              $sql= $pdo->prepare("SELECT a.id_arquivo, a.titulo, a.foto_v FROM arquivo a ORDER BY id_arquivo DESC;");
              $sql->execute();
            }

            while($lista = $sql->fetch(PDO::FETCH_ASSOC)):
            ?>
              <li class="cartao__container--item">
                <a href="posts.php" class="flex flex-coluna">
                  <div class="item-img">
                    <img src=<?php echo $lista["foto_v"];?>>
                  </div>
                  <span class="item-titulo"><?php echo $lista["titulo"];?></span>
                </a>
                <a class="link-container flex flex-items-center " href="perfil.php"> 
                  <img src=<?php echo '"'.$_SESSION ['foto_p'].'"'?> alt="Foto de perfil">
                  <span class="item-user"><?php echo ''.$_SESSION ['nome'].''?></span>
                </a>
                
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
