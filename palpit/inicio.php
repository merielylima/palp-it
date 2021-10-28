<?php
  include ("cabecalho.php");
  require_once 'classes/usuarios.php';
    $u = new Usuarios;
    session_start();
?>
<main  class="container container-xl my-xl" >
    <div class="flex flex--centro flex--coluna flex--row px-5  flex-start">
      <nav class="left-side  cartao--container flex-shrink-0 mb-4">
        <div class="info-user mb-3 flex flex--coluna flex-items-center d-block"> 
          <div >
            <label for="p_chave" class="input--label">Palavras-chave</label>
            <input name = "p_chave" type="search" placeholder="Pesquisar" class=" width-full input">
          </div>
          <div>
            <label for = "nivel"class="input--label">Disciplina</label>
            <select name="nivel" id="nivel" class=" option input width-full">
              <option value="Fisica">Física</option>
              <option value="Quimica">QuimicaI</option>
              <option value="Biologia">Biologia</option>
              <option value="Geografia">Geografia</option>
            </select>
          </div>
          <div>
            <label for = "grau"class="input--label">Grau de escolaridade</label>
          <div class="flex flex--coluna">
            <label class="checkbox--label ">
              <input type="checkbox" name="receber" checked> 
              Ensino fundamental I
            </label>
            <label class="checkbox--label">
              <input type="checkbox" name="receber" checked> 
              Ensino fundamental II
            </label>
            <label class="checkbox--label">
              <input type="checkbox" name="receber" checked> 
              Ensino fundamental II
            </label>
          </div>
        <button class="botao--container botao--primario width-full">Pesquisar </button>
        </nav>
      <section class=" right-side cartao--container cartao-p2 flex-shrink-0 relative">
        <h2 class="container--titulo"> Resultados de filtro</h2>
        <div class="flex flex--centro ordenar input-envio option input flex-items-center ">
          <label class="">Ordenar por: </label>
          <select name="" id="" class="a">
            <option value=""> Populares</option>
            <option value=""> Novos</option>
            <option value=""> Antigos</option>
          </select>
        </div>
        <ol class="flex wrap-evenly">
          <li class="flex flex-items-center flex--coluna item">
            <img src="assets/img/publicacoes/post1.png" >
            <span class="">Modelo de Borh</span>
          </li>
          <li class="flex flex-items-center flex--coluna item">
            <img src="assets/img/publicacoes/post4.png" >
            <span class="">Bola de bilhar</span>
          </li>
          <li class="flex flex-items-center flex--coluna item">
            <img src="assets/img/publicacoes/post3.png" >
            <span class="">Modelo de Bohr</span>
          </li>
          <li class="flex flex-items-center flex--coluna item">
            <img src="assets/img/publicacoes/post2.png" >
            <span class="">Rutherford</span>
          </li>
          <li class="flex flex-items-center flex--coluna item">
            <img src="assets/img/publicacoes/post5.png" >
            <span class="">Pudim de passas</span>
          </li>
          <li class="flex flex-items-center flex--coluna item">
            <img src="assets/img/publicacoes/post6.png" >
            <span class="">Rutherford</span>
          </li>
        </ol>
      </section>
    </div>
  </main>
  <?php
    include ("rodape.php");
  ?>  
