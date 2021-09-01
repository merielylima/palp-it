
<?php
require_once 'classes/usuarios.php';
$u = new Usuarios;

//verificar se clicou no botao
if(isset($_POST['nome']))
{
	$nome = addslashes($_POST['nome']); //addslashes evita codigos maliciosos.
	$email = addslashes($_POST['email']);
	//$profissao = addslashes($_POST['profissao']);
	$senha = addslashes($_POST['senha']);
	$area = addslashes($_POST['area']);
	$receber = addslashes($_POST['receber']);
	//verificando se todos os campos nao estao vazios
	
		$u->conectar();
		if ($u->msgErro=="") //conectado normalmente;
		{
			if ($u->cadastrar($nome, $email, $senha, $area, $receber))
				{
					?>
					<!DOCTYPE html>
					<html lang="pt">
					<head>
					<meta charset="UTF-8">
						<meta name="viewport" content="width=device-width, initial-scale=1.0">
						<title>Palp-it</title>
						<link rel="preconnect" href="https://fonts.googleapis.com">
						<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
						<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
						<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"> 
						<link rel="stylesheet" href="./assets/css/base/base.css">
						<link rel="stylesheet" href="./assets/css/componentes/cartao.css">
						<link rel="stylesheet" href="./assets/css/componentes/inputs.css">
						<link rel="stylesheet" href="./assets/css/componentes/botao.css">
					</head>
					<body>
						<main class="container flex flex--coluna flex--centro">
							<section class="cartao--container cartao--pequeno">
								<div class="">
									<img src="assets/img/Logo-palp-it.svg" alt="Logo Palp-it"/>
									<h2 class="container--titulo">Falta pouco...</h2>
								</div>
								<p class="mensagem">  Para concluir seu cadastro, é necessário clicar no link de confirmação enviado para o endereço <a class="link mensagem" > <?php echo $email ?> </a>. </p>
								<a href="inicio_cadastro.html"> <button class="botao--container botao--primario botao--block">  Voltar para página inicial </button></a>
							</section>
						</main>
					</body>
					</html>

					<?php
					
				}
				else
			 	{
					?>
					<div class="msg_erro">
						Email já cadastrado, retorne e faça login.
					</div>
					<?php
			 	}
			
		}
		else
			{
				?>
				<div class="msg_erro">
					<?php echo "Erro: ".$u->msgErro;?>
				</div>
				<?php
			}
}
?>

