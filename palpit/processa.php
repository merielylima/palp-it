<h1>bem vindo</h1>
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
	$confirmarSenha = addslashes( $_POST['confSenha']);
	$area = addslashes($_POST['area']);
	//verificando se todos os campos nao estao vazios
	if(!empty($nome)  && !empty($email) && !empty($profissao)&& !empty($senha) && !empty($confirmarSenha) && !empty($area)) 
	{
		$u->conectar("test","localhost","root",""); //seta as configs do db//set db config
		if ($u->msgErro == "") //conectado normalmente;
		{
			if ($senha == $confirmarSenha) 
			{
				if ($u->cadastrar($nome, $email, $profissao, $senha, $area))  //Enviando variaveis para o banco
				{
					echo "Cadastro realizado com sucesso!";
				}
				else
			 	{
			 		echo "Email já cadastrado, retorne e faça login.";
			 	}
			}
			else
			{
				echo "Senhas não conferem!";
			}
		}
		else 
		{
		echo "Erro: ".$u->msgErro;
		}
	}
	else
		{
			echo "Preencha todos os campos!";
		}
}
?>