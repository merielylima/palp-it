<?php
 include ("head.php");
?>
<main class="center container-erro">
    <div class=" flex flex-coluna p-os"> 
        <section class="cartao__container cartao-erro erro-container ">
            <span class="ops">Ops!</span>
            <h2 class="container--titulo">Página não encontrada :( </h2>
            <p>A página que você tentou acessar está indisponível ou não existe.</p>
            <div class="btn-erro">
                <a href="inicio.php" class="botao--container botao--primario botao-envio mx-1"> 
                <span class="material-icons-outlined ">home</span>
                Página inicial
                </a>
                <a href="" class="botao--container botao--secundario botao-envio mx-1">
                    <span class="material-icons-outlined"> forward_to_inbox</span>
                    Fale conosco
                </a>
            </div>
        </section>
    </div>
</main>
<?php
include ("rodape.php");
?>