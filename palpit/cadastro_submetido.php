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
					<h2 class="container--titulo mb-2">Falta pouco...</h2>
				</div>
				<div class="cartao-xs__txt my-3 text-justify">
					<p>
						Para concluir seu cadastro, é necessário clicar no link de confirmação enviado para o endereço <a class="link bold" > <?php echo $_GET["email"] ?></a></p>
					<p>Caso não tenha recebido, verifique se o email informado está correto. Se o problema persistir, entre em contato com <span class="bold"> comunidadepalpit@gmail.com </span></p>
				</div>
				<a href="inicio.php"> <button class="botao--container botao--primario width-full">  Voltar para página inicial </button></a>
			</section>
		</div>
	</main>
</body>
