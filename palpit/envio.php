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
  <header class="cabecalho py-1 px-2 px-5">
    <div class="cabecalho__content ">
      <div class="cabecalho__left-side flex flex-items-center">
        <a href="home.html" class=" flex flex-items-center"> <img src="assets/img/Logo-palp-it.svg" class="cabecalho--logo" alt="Logo Palp-it"/></a>
            <div class="cabecalho--pesquisa px-4">
                <input type="search" placeholder="Pesquisar" class=" search-icon input-pesquisa botao--container border">
            </div>
            <nav class="lista-navegacao">
              <ul class="flex ">
                <li class="lista-navegacao--item  botao--container mx-2 ">
                  <a href="home.html"><span class="material-icons">home</span> Início</a>
                </li>
                <li class="lista-navegacao--item  botao--container mx-2 ">
                  <a href="perfil.html"> <span class="material-icons">person</span> Perfil</a>
                </li>
                <li class="lista-navegacao--item  botao--container mx-2">
                  <a href="contribuicoes.html"><span class="material-icons">file_upload</span> Contribuições</a>
                </li>
              </ul>
            </nav>
      </div>
      <div class="cabecalho__right-side flex flex-items-center">
       
        <div class="user lista-navegacao">
          <div class="user__menu"> 
            <div class=" lista-navegacao--item botao-cabecalho botao--container border">
              <a href="envio.html"> <span class="material-icons">add</span> Novo envio</a>
            </div>
            <span class="material-icons notifications">
              notifications_none
            </span>
            <img class="user__menu--photo" src="assets/img/avatar.svg" alt="Foto de perfil">
            <span class="material-icons">expand_more</span>
          </div>
        </div>
        </div>
      </div>
    </div>
  </header>

  <main  class="container container-xx my-xl" >
    <div class="flex flex--centro flex--coluna flex--row  pl-5 pr-5 ">
      <section class="cartao--container cartao-xl width-full">
        <h2 class="container--titulo"> Novo envio </h2>
        <p class="card--description">
          Os arquivos submetidos são avaliados por um mediador, para então serem postados.
        </p>
        <form id = form-adiciona name="envio" action="XXXXXXXX" method="POST">
          <div class="my-2 flex relative">
            <div class="content-files">
              <p  class="input--label">Imagem Tátil<span class="obrigatorio">*</span></p>
              <label class="row--file flex"> 
                <span class="input--file-button botao--terciario botao--container">Escolher arquivo</span>
                <span class="input--file-text"> Nenhum arquivo selecionado</span>
              </label>
              <input id="imagem_tatil" name="imagem_tatil" type="file" class="input--file" required/>
            </div>
            <div class="content-files">
              <p class="input--label">Imagem Visual<span class="obrigatorio">*</span></p>
              <label class="row--file flex"> 
                <span class="input--file-button   botao--terciario botao--container">Escolher arquivo</span>
              </label>
              <input id="imagem_visual" name="imagem_visual" type="file" class="input--file" required/>
            </div>
            <img class="imagem" src="assets/img/publicacoes/modelo-atomico.png"/>
          </div>
          <div class="my-2 flex">
            <div>
              <label for="titulo"  class="input--label"> Título<span class="obrigatorio">*</span> </label>
              <input id="titulo" name="titulo" class="input input-envio" type="text" placeholder="ex: Mapa do Brasil" minlength="6" required> 
              <!-- <span class="input-message-erro"> Este campo não está válido</span> -->
            </div>
            <div class="width-full">
              <label for="palavra-chave"  class="input--label" > Palavras-chave <span class="obrigatorio">*</span></label>
              <input id="palavra-chave" name= "palavra-chave" class="input width-full input-envio" type="text" placeholder="ex: geografia; mapa-do-brasil; " minlength="6" required> 
              <!-- <span class="input-message-erro"> Este campo não está válido</span> -->
            </div>
          </div>
          <div  class="my-2">
            <div class="content-descripcion">
              <label for="descricao" class="input--label "> Descrição <span class="">(opcional)</span></label>
              <textarea id="descricao" class="input input-envio textarea"></textarea>
              <!-- <span class="input-message-erro"> Este campo não está válido</span> -->
            </div>
          </div>
          <div id="conteudo" class="flex my-2">
            <div class="input-container ">
              <label for="nivel" class="input--label"> Grau de escolaridade <span class="obrigatorio">*</span></label>
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
                <option value="Química">Química</option>
                <option value="Biologia">Biologia</option>
                <option value="Fisica">Fisica</option>
              </select>
            </div>
            <div class="flex flex-items-end">
              <button id="adiciona-lista" onClick="adicionarItem()" value="Adicionar" class="botao--container botao-envio botao--terciario">Adicionar</button>
            </div>
          </div>
          <table class="table my-2">
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
          
           
          <div class="my-2 flex flex--end">
            <button class="botao--container botao--secundario botao-envio botao-aviso"> Cancelar </button>
            <button class="botao--container botao--primario botao-envio "> Enviar </button>
          </div>
        </form>
      </div>
    </section>
  </main>

<script src="js/formulario.js"></script>
</body>
</html>