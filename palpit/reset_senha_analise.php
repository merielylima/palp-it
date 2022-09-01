<?php
 include ("head.php");
?>
<body>
    <main class="center container-xs">
        <div class="flex flex-coluna px-3">
        <section class=" cartao__container cartao-xs">
            <div class="border-bottom">  
                <a href="inicio.php">
                    <img src="assets/img/icon/Logo.svg" alt="Logo Palp-it"/>
                </a> 
                <h2 class="container--titulo mb-2">Recuperar senha</h2> 
            </div>
            <div class="cartao-xs__txt my-2 text-justify">
                <p class="text-justify">  Um email de confirmação foi enviado para o endereço <a class="link semi-bold" > <?php echo $_SESSION['email'] ?> </a>. </p>
                <p>Caso não tenha recebido, verifique se o email informado está correto.</p>
				<p>Se o problema persistir, entre em contato com <span class="semi-bold"> comunidadepalpit@gmail.com </span></p>
            </div>
            <button class="botao--container botao--primario width-full"> <a href="inicio.php" >Voltar para página inicial</a></button>
            </section>
        </div>
    </main>
    </body>
</html>
