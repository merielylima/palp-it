<?php
 include ("cabecalho.php");
?>
  <main  class="container container-xx my-xl" >
    <div class="flex flex--centro flex--coluna flex--row  pl-5 pr-5 ">
      <section class="cartao--container cartao-xl width-full">
        <h2 class="container--titulo"> Novo envio </h2>
        <p class="card--description">
          Os arquivos submetidos são avaliados por um mediador, para então serem postados.
        </p>
        <form id="form-adiciona" name="envio" action="arquivo.php" enctype='multipart/form-data' method="POST">
          <div class="my-2 flex relative">
            <div class="content-files">
              <p  class="input--label">Imagem Tátil<span class="obrigatorio">*</span></p>
              
              <label for="imagem_tatil" class="row--file flex"> 
                <span class="input--file-button botao--terciario botao--container">Escolher arquivo</span>
                <span class="input--file-text"> Nenhum arquivo selecionado</span>
              </label>
              <input id="imagem_tatil" name="imagem_tatil" type="file" class="input--file" required/>

            </div>
            <div class="content-files">
              <p class="input--label">Imagem Visual<span class="obrigatorio">*</span></p>
              <label for="imagem_visual" class="row--file flex"> 
                <span class="input--file-button   botao--terciario botao--container">Escolher arquivo</span>
              </label>
              <input id="imagem_visual" onchange="readURL(this);" name="imagem_visual" type="file" class="input--file" required/>
            </div>
            <img class="imagem" id="img_prev" src="assets/img/publicacoes/modelo-atomico.png"/>
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
              <A id="adiciona-lista" onClick="adicionarItem()" value="Adicionar" class="botao--container botao-envio botao--terciario">Adicionar</A>
            </div>
          </div>
          <table class="table my-2">
            <thead class="table__cabecalho">
              <tr>
                <th class="row-table"> Nível </th>
                <th class="row-table"> Disciplina </th>
                <th class="row-table"> Remover </th> 
              </tr>
            </thead>
            <tbody id ="tabela" class="table__content">
        
            </tbody>   
          </table>
           
          <div class="my-2 flex flex--end">
            <A onclick="voltarPrincipal()" class="botao--container botao--secundario botao-envio botao-aviso"> Cancelar </A>
            <button onclick="enviarFormulario()" class="botao--container botao--primario botao-envio "> Enviar </button>
          </div>
        </form>
      </section>
    </div>
  </main>
<script src="js/formulario.js"></script>
<?php
include ("rodape.php");
?>
