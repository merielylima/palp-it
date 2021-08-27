<?php
  require_once 'classes/usuarios.php';
  $u = new Usuarios;
  ini_set("error_log", "C:/xampp/htdocs/Palp-it/php-error.log");
  error_log( "POST: " . print_r($_POST, true) );

	if(isset($_POST['email']))
	{
		$email = addslashes($_POST['email']);
		$senha = addslashes($_POST['senha']);
		$u->conectar(); //conectando ao banco
			if($u->msgErro=="") // caso a mensagem esteja vazia, login ok
			{
				if ($u->logar($email, $senha))
				{
					//echo '0';
					//echo $_SESSION['foto'];
					header("location:inicio.php"); //encaminhado para proxima area apos verificar usuario e senha
				}
				else
				{
					?>
					<div class="msg_erro">
						Email e/ou senha estão incorretos!
					</div>
					<?php	
					//echo '-1';

				}
			}
			else
			{
				?>
				<div class="msg_erro">
					<?php echo "Erro: ".$u->msgErro; ?>
				</div>
				<?php
			}
    }
?>

