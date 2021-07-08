<?php
 Class Usuarios {
	private $pdo;  /*criando variavel para usar nas funçoes*/
	public $msgErro="";
  	public function conectar($nome, $host, $usuario, $senha)
  	{
  		global $pdo;
      global $msgErro;
  		try
  		{
  			$pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
  		} catch (PDOException $e) {
  			$msgErro - $e->getMessage(); /*pega a mensagem de erro do php e joga na variavel msegErro e mostra pro usuario.*/
  		}
  	}
  	public function cadastrar($nome, $email, $profissao, $senha, $area, $receber)
  	{
  		global $pdo;
      global $msgErro;
	  $confirmacao = rand (1, getrandmax ());
  		//verificando se existe usuario cadastrado.
  		$sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email=:e"); //pega o id do usuario buscando pelo emial preenchido no cadastro
  		$sql->bindValue(":e", $email);  //substitui o :e pelo email preenchido no cadastro
  		$sql->execute();
  		if($sql->rowCount()>0) //verificando houve resposta na consulta
  		{
  			return false; // ja tem cadastro
  		}
  		else
  		{
  			//caso nao tenha
  			$sql = $pdo->prepare("INSERT INTO usuarios (nome, email, profissao, senha, area, receber, confirmacao) VALUES (:n, :e, :p,:s, :a, :r, :c)");
	  		$sql->bindValue(":n", $nome);
	  		$sql->bindValue(":e", $email);
			$sql->bindValue(":p", $profissao);
	  		$sql->bindValue(":s", md5($senha));
			$sql->bindValue(":a", $area);
			$sql->bindValue(":r", $receber);
			$sql->bindValue(":c", $confirmacao);
			$sql->execute();
					
			return true;
	  		
  		}

  	}
  	public function logar($email, $senha)
  	{
  		global $pdo;
      global $msgErro;
  		/*verificar se o email e senha estao cadastrados, se sim*/
  		$sql= $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email=:e AND senha=:s AND confirmacao=0");
  		$sql->bindValue(":e", $email);
  		$sql->bindValue(":s", md5($senha));
  		$sql->execute();
  		if($sql->rowCount()>0) //verificando houve resposta na consulta
  		{
  			//entrar no sistema criando uma (sessao)
  			$dado = $sql->fetch(); //transforma o retorno da query em array com os nomes das colunas
  			session_start();  //iniciando a sessao
  			$_SESSION['id_usuario'] = $dado['id_usuario']; //armazena o id do usuario na sessao.
  			return true;  //logado com sucesso
  		}
  		else
  		{
  			return false; //erro ao logar.
  		}
  	}

	public function confirmar($email, $codigo){
		global $pdo;
		$sql= $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email=:e AND confirmacao=:c");
		$sql->bindValue(":e", $email);
  		$sql->bindValue(":c", ($codigo));
		$sql->execute();

		if($sql->rowCount()>0) //verificando houve resposta na consulta
  		{
			$sql = $pdo->prepare('UPDATE usuarios SET confirmacao=\'0\' WHERE confirmacao=:c AND email=:e');
			$sql->bindValue(":c", $codigo);
			$sql->bindValue(":e", $email);
			$sql->execute();
  			return true;  //logado com sucesso
  		}
  		else
  		{
  			return false; //erro ao logar.
  		}

	}

}
