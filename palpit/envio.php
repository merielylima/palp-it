<?php
 include ("cabecalho.php");
 
 if (!isset($_SESSION['id_usuario'])) {
  // Destrói a sessão por segurança
  session_destroy();
  // Redireciona o visitante de volta pro login
  header("Location: index.php"); exit;
}
?>
  <main class="center container-xx">
    <section class="cartao__container cartao-xl">
      <div class="mb-2"> 
        <h2 class="container--titulo"> Novo envio </h2>
        <p>Os arquivos submetidos são avaliados por um mediador, para então serem postados.</p>
      </div>
      <form id="form-adiciona" name="envio" action="armazenar.php" enctype='multipart/form-data' method="POST">
      <div class="flex flex-coluna flex--row">
        <div class="width-full flex py-1">
          <div class="imagem-container">
            <img class="imagem" id="img_prev" src="assets/img/publicacoes/modelo-atomico.png"/>
          </div>
          <div class="pai">
            <div class="filho 1">
            <p  class="input--label">Imagem Visual<span class="obrigatorio">*</span></p>
              <label for="imagem_visual" class=""> 
                <span class="input--file-button   botao--terciario botao--container">+</span>
                <span class="input--file-text"> Nenhum arquivo selecionado</span>
              </label>
              <input id="imagem_visual" accept="image/*" onchange="readURL(this);" name="imagem_visual" type="file" class="input--file" required/>
            </div>
            <div class="filho 2" >
              <p class="input--label">Arquivo Tátil<span class="obrigatorio">*</span></p>
              <label for="imagem_tatil" class=""> 
                <span class="input--file-button botao--terciario botao--container">+</span>
                <span class="input--file-text"> Nenhum arquivo selecionado</span>
              </label>
              <input id="imagem_tatil" name="imagem_tatil" type="file" class="input--file" required/>
            </div>
          </div>
        </div>
        <div class="width-full  py-1">
          <div>
            <label for="titulo"  class="input--label"> Título<span class="obrigatorio">*</span> </label>
            <input id="titulo" name="titulo" class="input width-full input-envio" type="text" placeholder="ex: Mapa do Brasil" minlength="6" required> 
              <!-- <span class="input-message-erro"> Este campo não está válido</span> -->
          </div>
          <div>
            <label for="p_chave"  class="input--label" > Palavras-chave <span class="obrigatorio">*</span></label>
            <textarea id="p_chave" name="p_chave" class="input textarea width-full input-envio" type="text" placeholder="ex: geografia; mapa-do-brasil; " minlength="6" required></textarea>
            <!-- <span class="input-message-erro"> Este campo não está válido</span> -->
          </div>
          <div>
            <label for="descricao" class="input--label "> Descrição <span class="">(opcional)</span></label>
            <textarea name="descricao" id="descricao" class="input input-envio textarea"></textarea>
            <!-- <span class="input-message-erro"> Este campo não está válido</span> -->
          </div>
        </div>
      </div>

        <div id="conteudo" class="flex py-1">
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
        <table class="table py-1">
          <thead class="table__cabecalho">
            <tr>
              <th class="row-table"> Nível </th>
              <th class="row-table"> Disciplina </th>
              <th class="row-table"> Remover </th> 
            </tr>
          </thead>
          <tbody id ="tabela" class="table__content"></tbody>   
        </table>
        <div class="py-1 flex flex--end">
          <A onclick="voltarPrincipal()" class="botao--container botao--secundario botao-envio botao-aviso"> Cancelar </A>
          <button onclick="enviarFormulario()" class="botao--container botao--primario botao-envio "> Enviar </button>
        </div>
      </form>
    </section>
  </main> 
<script src="js/formulario.js"></script>
<?php
include ("rodape.php");
?>
