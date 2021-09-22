<?php
 include ("cabecalho.php");
?>
    
  <main  class="container container-xl my-xl" >
    <div class="flex flex--centro flex--coluna flex--row px-5  flex-start">
      <nav class="left-side  cartao--container flex-shrink-0 mb-4">
        <div class="info-user mb-3 flex-items-center d-block"> 
          <input id="js-file-uploader" class="hidden" name="profile-picture" type="file" accept="image/png, image/jpeg" />
          <img class=" mr-3 avatar col-2 flex-shrink-0" src=<?php echo '"'.$_SESSION ['foto_p'].'"'?>>
          <div class="vcartao-nome">
            <span class="vcard-fullname block"> <?php echo '"'.$_SESSION ['nome'].'"'?></span>
            <span class="vcard-username block"><?php echo '"'.$_SESSION ['email'].'"'?></span>
          </div>
        </div>
        <div class="flex flex--coluna">
          <p><?php echo '"'.$_SESSION ['profissao'].'"'?></p>
          <ul class="my-2">
            <li> <spam class="material-icons">location_on </spam>Tucuruí - Pará</li> 
            <li> <span class="material-icons"> mail</span><?php echo '"'.$_SESSION ['email'].'"'?></li>
          </ul>
          <button class="botao--container botao--secundario width-full"> Editar perfil </button>  
        </div>
      </nav>
      <section class=" right-side cartao--container cartao-p2 flex-shrink-0 relative">
        <h2 class="container--titulo"> Mais populares</h2>
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
            <img src="assets/img/publicacoes/mapa-do-brasil.png" >
            <span class="">Mapa do brasil</span>
          </li>
          <li class="flex flex-items-center flex--coluna item">
            <img src="assets/img/publicacoes/modelo-atomico.png" >
            <span class="">Molecula H2O</span>
          </li>
          <li class="flex flex-items-center flex--coluna item">
            <img src="assets/img/publicacoes/rosa-dos-ventos.png" >
            <span class="">Rosa dos ventos</span>
          </li>
          <li class="flex flex-items-center flex--coluna item">
            <img src="assets/img/publicacoes/sistema-solar.png" >
            <span class="">Sistema Solar</span>
          </li>
          <li class="flex flex-items-center flex--coluna item">
            <img src="assets/img/publicacoes/modelo-atomico.png" >
            <span class="">Modelo Atômico</span>
          </li>
          <li class="flex flex-items-center flex--coluna item">
            <img src="assets/img/publicacoes/circulo-trigonometrico.png" >
            <span class="">Circulo trigonométrico</span>
          </li>
        </ol>
      </section>
    </div>
  </main>

<?php
include ("rodape.php");
?>