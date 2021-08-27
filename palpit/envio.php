<?php
require_once 'classes/usuarios.php';
$u = new Usuarios;
session_start();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/base/base.css">
  <link rel="stylesheet" href="./assets/css/componentes/cartao.css">
  <link rel="stylesheet" href="./assets/css/componentes/inputs.css">
  <link rel="stylesheet" href="./assets/css/componentes/botao.css">
  <link rel="stylesheet" href="./assets/css/cabecalho.css">
  <link rel="stylesheet" href="./assets/css/envio.css">
  <title>Palp-it</title>
</head>
<body>
  <header class="cabecalho">
    <img src="assets/img/Logo-palp-it.svg" class="cabecalho__logo" alt="Logo Palp-it" />
    <!-- Botão de pesquisa -->
    <div class="cabecalho__pesquisa">
      <input type="search" placeholder="Pesquisar" class="cabecalho__pesquisa--input botao-cabecalho botao-border">
    </div>
    <!-- Links (pages) -->
    <nav>
      <ul class="cabecalho__lista-navegacao">
        <li class="lista-navegacao--item botao-cabecalho botao--container">
          <a href="inicio.php"><span class="material-icons">home</span>Início</a>
        </li>
        <li class="lista-navegacao--item botao-cabecalho botao--container ">
          <a href="perfil.php"> <span class="material-icons">person</span> Perfil</a>
        </li>
        <li class="lista-navegacao--item botao-cabecalho botao--container">
          <a href="contribuicoes.php"><span class="material-icons">file_upload</span>Contribuições</a>
        </li>
      </ul>
    </nav>
      
      <div class="user">
        <div class="user__menu"> 
          <div class=" lista-navegacao--item botao-cabecalho botao--container botao-border">
            <a href="envio.php"> <span class="material-icons">add</span> Novo envio</a>
          </div>
          <span class="material-icons notifications">
            notifications_none
          </span>
          <img class="user__menu--photo" src=<?php echo '"'.$_SESSION ['foto_p'].'"'?> alt="Foto de perfil">
          <span class="material-icons">expand_more</span>
        </div>
      </div>
  </header>

  <main class="container flex flex--centro">
    <section class="cartao--container">
      <h2 class="container--titulo"> Novo envio </h2>
      <p class="card--description">
        Os arquivos submetidos são avaliados por um mediador, para então serem postados.
      </p>
      <form class="flex flex--coluna" id = form-adiciona name="envio" action="arquivo.php" method="POST" enctype="multipart/form-data">
        <div id="conteudo" class="flex row-content">
          <div class="input-container ">
            <label for="nivel" class="input--label"> Nível de escolaridade <span class="obrigatorio">*</span></label>
            <select name="nivel" id="nivel" class="input-envio option input">
              <option value="Fundamental I">Fundamental I</option>
              <option value="Fundamental II">Fundamental II</option>
              <option value="Médio">Médio</option>
              <option value="Superior">Superior</option>
            </select>
          </div>
          <div class="input-container ">
            <label for="disciplina" class="input--label"> Disciplina<span class="obrigatorio">*</span> </label>
            <select name="disciplina" id="disciplina" class=" input-envio option input">
              <option value="Matematica">Matemática</option>
              <option value="Biologia">Biologia</option>
              <option value="Geografia">Geografia</option>
              <option value="Artes">Artes</option>
              <option value="Historia">Historia</option>
              <option value="Sociologia">Sociologia</option>
            </select>
          </div>
          <button id="adiciona-lista" onClick="adicionarItem()" value="Adicionar" class="botao--container botao-envio botao--terciario">Adicionar</button>
        </div>
        <table class="table row-content">
          <thead class="table__cabecalho">
            <tr>
              <th class="row-table"> Nível </th>
              <th class="row-table"> Disciplina </th>
              <th class="row-table">Remover</th> 
            </tr>
          </thead>
          <tbody id ="tabela" class="table__content">
            
          </tbody>   
        </table>
        <div class="row-content flex">
          <div class="content__title">
            <label for="titulo"  class="input--label"> Título<span class="obrigatorio">*</span> </label>
            <input id="titulo" name="titulo" class="input input-envio" type="text" placeholder="exemplo..." minlength="6" required> 
            <!-- <span class="input-message-erro"> Este campo não está válido</span> -->
          </div>
          <div class="content-pchave input-cheio">
            <label for="palavra-chave"  class="input--label" > Palavras-chave <span class="obrigatorio">*</span></label>
            <input id="palavra-chave" name= "palavra-chave" class="input input-cheio input-envio" type="text" placeholder="exemplo..." minlength="6" required> 
            <!-- <span class="input-message-erro"> Este campo não está válido</span> -->
          </div>
        </div>
        <div  class="row-content">
          <div class="content-descripcion">
            <label for="descricao" class="input--label "> Descrição </label>
            <textarea id="descricao" name= "descricao" class="input input-envio textarea"></textarea>
            <!-- <span class="input-message-erro"> Este campo não está válido</span> -->
          </div>
        </div>
        <div class="row-content flex">
          <div class="content-files">
            <p class="input--label">Imagem Visual<span class="obrigatorio">*</span></p>
            <label class="row--file flex"> 
              <span class="input--file-button   botao--terciario botao--container">Escolher arquivo</span>
              <span class="input--file-text">Nenhum arquivo selecionado</span>
            <input id="imagem_visual" name="imagem_visual" type="file" class="input--file" required/>
          </div>
          <div class="content-files">
            <p  class="input--label">Imagem Tátil<span class="obrigatorio">*</span></p>
            <label class="row--file flex"> 
              <span class="input--file-button botao--terciario botao--container">Escolher arquivo</span>
              <span class="input--file-text"> Nenhum arquivo selecionado</span>
            <input id="imagem_tatil" name="imagem_tatil" type="file" class="input--file" required/>
          </div>
        </div> 
        <div class="row-content row--botoes">
          <button class="botao--container botao--secundario botao-envio botao-aviso"> Cancelar </button>
          <button class="botao--container botao--primario botao-envio "> Enviar </button>
      </div>
      </form>
    </section>
  </main>

<script src="js/formulario.js"></script>
</body>
</html>