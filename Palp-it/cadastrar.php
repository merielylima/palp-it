
<?php
require_once 'classes/usuarios.php';
$u = new Usuarios;

//verificar se clicou no botao
if(isset($_POST['nome']))
{
	$nome = addslashes($_POST['nome']); //addslashes evita codigos maliciosos.
	$email = addslashes($_POST['email']);
	$profissao = addslashes($_POST['profissao']);
	$senha = addslashes($_POST['senha']);
	$area = addslashes($_POST['area']);
	$receber = addslashes($_POST['receber']);
	//verificando se todos os campos nao estao vazios
	
		$u->conectar("test","localhost","root","");
		if ($u->msgErro=="") //conectado normalmente;
		{
			if ($u->cadastrar($nome, $email, $profissao, $senha, $area, $receber))
				{
					?>
					<!DOCTYPE html>
					<html lang="pt">
					<head>
						<meta charset="UTF-8">
						<meta name="viewport" content="width=device-width, initial-scale=1.0">
						<title>Braille-Hub</title>
						<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
						<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"> 
						<link rel="stylesheet" href="./assets/css/base/base.css">
						<link rel="stylesheet" href="./assets/css/cadastro.css">
						<link rel="stylesheet" href="./assets/css/cadastro_concluido.css">
						<link rel="stylesheet" href="./assets/css/componentes/cartao.css">
						<link rel="stylesheet" href="./assets/css/componentes/inputs.css">
						<link rel="stylesheet" href="./assets/css/componentes/botao.css">
					</head>
					<body>
						<main class="container flex flex--coluna flex--centro">
							<section class="cadastro-cartao cartao">
								<div class="cadastro-cabecalho">
									<img src="assets/img/Logo.svg" class="cadastro-cabecalho__logo"/>
									
								</div>
								<h2 class="cadastro-cabecalho__titulo">Falta pouco...</h2>
								<p class="mensagem">  Para concluir seu cadastro, é necessário clicar no link de confirmação enviado para o endereço <a class="link mensagem" > <?php echo $email ?> </a> </p>
								<a href="login.html" class="botao botao--primario">Voltar para página inicial</a>
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

