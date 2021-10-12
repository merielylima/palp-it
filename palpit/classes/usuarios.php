<?php
 Class Usuarios {
	private $pdo;  /*criando variavel para usar nas funçoes*/
	public $msgErro="";
	public $id=0;
	
	public function conectar(){
  		global $pdo;
      	global $msgErro;
		//Credenciais de acesso BD
		define('HOST', 'localhost');
		define('USER', 'root');
		define('PASS', '');
		define('DBNAME', 'palpit');

  		try{
		  	$pdo = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';',USER,PASS);

			return $pdo;
  		} catch (PDOException $e){
  			echo ($msgErro . $e->getMessage()); /*pega a mensagem de erro do php e joga na variavel msegErro e mostra pro usuario.*/
  		}
  	}

  	public function cadastrar($nome, $email, $senha, $area, $receber, $confirmacao){
  	  global $pdo;
      global $msgErro;
	  $foto_p = "assets/img/def.jpg";
  		//verificando se existe usuario cadastrado.
  		$sql = $pdo->prepare("SELECT id_usuario FROM usuario WHERE email=:e"); //pega o id do usuario buscando pelo emial preenchido no cadastro
  		$sql->bindValue(":e", $email);  //substitui o :e pelo email preenchido no cadastro
  		$sql->execute();
		
  		if($sql->rowCount()>0){ //verificando houve resposta na consulta
  			return false; // ja tem cadastro
  		}
  		else{
  			//caso nao tenha
  			$sql = $pdo->prepare("INSERT INTO usuario (nome, email, senha, area, receber, confirmacao,foto_p) VALUES (:n, :e,:s, :a, :r, :c, :fp)");
	  		$sql->bindValue(":n", $nome);
	  		$sql->bindValue(":e", $email);
			//$sql->bindValue(":p", $profissao);
	  		$sql->bindValue(":s", md5($senha));
			$sql->bindValue(":a", $area);
			$sql->bindValue(":r", $receber);
			$sql->bindValue(":c", $confirmacao);
			$sql->bindValue(":fp", $foto_p);
			$sql->execute();
					
			return true;
  		}

  	}

  	public function logar($email, $senha){
  	  global $pdo;
      global $msgErro;
  		/*verificar se o email e senha estao cadastrados, se sim*/
  		$sql= $pdo->prepare("SELECT id_usuario, nome, email, area, profissao, foto_p  FROM usuario WHERE email=:e AND senha=:s AND confirmacao=0");
  		$sql->bindValue(":e", $email);
  		$sql->bindValue(":s", md5($senha));
  		$sql->execute();
  		if($sql->rowCount()>0) //verificando houve resposta na consulta
  		{
  			//entrar no sistema criando uma (sessao)
  			$dado = $sql->fetch(); //transforma o retorno da query em array com os nomes das colunas
  			session_start();  //iniciando a sessao
  			$_SESSION['id_usuario'] = $dado['id_usuario']; //armazena o id do usuario na sessao.
			$_SESSION['nome'] = $dado['nome'];
			$_SESSION['email'] = $dado['email'];
			$_SESSION['area'] = $dado['area'];
			$_SESSION['profissao'] = $dado['profissao'];
			$_SESSION['foto_p'] = $dado['foto_p'];
			return true;  //logado com sucesso
  		}
  		else
  		{
  			return false; //erro ao logar.
  		}
  	}

	public function enviar($titulo, $descricao, $foto_v, $foto_t)
  	{
  		global $pdo;
      	global $msgErro;
				  		
  		$sql= $pdo->prepare("INSERT INTO arquivo (titulo, descricao, foto_t, foto_v, id_usuario_fk) VALUES (:t, :d, :fv, :ft,:fku)");
  		$sql->bindValue(":t", $titulo);
		$sql->bindValue(":d", $descricao);
		$sql->bindValue(":fv", $foto_v);
		$sql->bindValue(":ft", $foto_t);
		$sql->bindValue(":fku", $_SESSION['id_usuario']);
  		$sql->execute();
		$_SESSION['id_arquivo'] = $pdo->lastInsertId();
		return true;  
  		
  	}
	

	public function confirmar($email, $codigo){
		global $pdo;
		
		$sql= $pdo->prepare("SELECT id_usuario FROM usuario WHERE email=:e AND confirmacao=:c");
		$sql->bindValue(":e", $email);
  		$sql->bindValue(":c", ($codigo));
		$sql->execute();

		if($sql->rowCount()>0) //verificando houve resposta na consulta
  		{
			$sql = $pdo->prepare('UPDATE usuario SET confirmacao=\'0\' WHERE confirmacao=:c AND email=:e');
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

	public function logado(){
		session_start();
		if (isset($_SESSION['id_usuario']) && $_SESSION['id_usuario']!=-1){
			return 1;
		}else{
			header ("Location: inicio_cadastro.html");
		}
	}
	
}
