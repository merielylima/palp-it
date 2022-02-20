
<?php
require_once 'classes/usuarios.php';
include "email.php";

$u = new Usuarios;
session_start();

//verificar se variavel foi iniciada
if(isset($_POST['nome'])){

	//Recupera informação do formulario
	$nome = addslashes($_POST['nome']); //addslashes evita codigos maliciosos.
	$email = addslashes($_POST['email']);
	//$profissao = addslashes($_POST['profissao']);
	$senha = addslashes($_POST['senha']);
	$area = addslashes($_POST['area']);
	$receber = addslashes(isset($_POST['receber'])) ? true : null;
	$confirmacao = rand (1, getrandmax ());
	
		$u->conectar(); //Conecta ao banco de dados
		if ($u->msgErro==""){
    		$pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);//Ativa o lançamento de exceptions para erros
			$pdo->beginTransaction(); //inicia uma transação
			if ($u->cadastrar($nome, $email, $senha, $area, $receber, $confirmacao)){					

				$enviaremail = smtpmailer ($_POST ['email'], 'baille.hub@gmail.com', 'PALP-it', 'Email de confirmação PALP-it', 'Clique no link para confirmar o seu email http://localhost/palp-it/palpit/confirmacao.php?codigo='.$confirmacao.'&email='.$_POST ['email']);
				//$enviaremail = smtpmailer ($_POST ['email'], 'baille.hub@gmail.com', 'PALP-it', 'Email de confirmação PALP-it', 'Clique no link para confirmar o seu email http://rnaat.ufpa.br/palp-it/palpit/confirmacao.php?codigo='.$confirmacao.'&email='.$_POST ['email']);
					if ($enviaremail) {
						$pdo->commit(); //envia uma transação
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
									<main class="center container-xs">
										<div class="flex flex-coluna px-3">
											<section class=" cartao__container cartao-xs">
												<div class="border-bottom">
													<img src="assets/img/icon/Logo-palp-it.svg" alt="Logo Palp-it"/>
													<h2 class="container--titulo">Falta pouco...</h2>
												</div>
												<p class="cartao-xs__txt my-3">  Para concluir seu cadastro, é necessário clicar no link de confirmação enviado para o endereço <a class="link" > <?php echo $email ?> </a>. </p>
												<a href="inicio.php"> <button class="botao--container botao--primario width-full">  Voltar para página inicial </button></a>
											</section>
										</div>
									</main>
								</body>
								</html>

						<?php
					} 
					else {
						$pdo->rollback();  //reverte uma transação
						$_SESSION['erro'] = 'Email de confirmação não enviado <br> contacte palp-it@ufpa.br';
						header("Location: cadastro.php");
					}
			}
			else{
				$_SESSION['erro'] = 'Já existe um usuário com o mesmo email.';
				header("Location: cadastro.php");
				?>
				<?php
			}
			
		}
		else{
			?>
			<div class="msg_erro">
				<?php echo "Erro: ".$u->msgErro;?>
			</div>
			<?php
		}
}
?>

