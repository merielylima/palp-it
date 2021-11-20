<?php
  require_once 'classes/usuarios.php';
  $u = new Usuarios;
  ini_set("error_log", "C:/xampp/htdocs/Palp-it/php-error.log");
  error_log( "POST: " . print_r($_POST, true) );

	if(isset($_POST['email']))//Verifica se variavel foi iniciada
	{
		$email = addslashes($_POST['email']);
		$senha = addslashes($_POST['senha']);
		$u->conectar(); //conectando ao banco
			if($u->msgErro=="") // caso a mensagem esteja vazia, login ok
			{
				if ($u->logar($email, $senha)){
					echo '0';
					//echo $_SESSION['foto'];
				}
				else{
					echo '-1';
				}
			}
			else
			{
				echo '-1';
			}
    }
?>

