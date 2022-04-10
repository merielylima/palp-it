<?php
  require_once 'classes/usuarios.php';
  $u = new Usuarios;
  
  session_start(); //iniciando sessão
  
  $u->conectar(); //conexão banco de dados
  
	//recuperação das informações formulario
	$titulo = addslashes($_POST['titulo']);
	$descricao = addslashes($_POST['descricao']);
	$tag = addslashes($_POST['p_chave']);
	$foto_v;
	$foto_t;
	$status=0;


  	if (isset ($_FILES ['imagem_visual']) && $_FILES ['imagem_visual']['name'] != '') {
		$foto_v = "assets/img/visual/".time().'_'.basename ($_FILES ['imagem_visual']['name']);
	}
	else{
		return -1;
	}

	if (isset ($_FILES ['imagem_visual']) && $_FILES ['imagem_visual']['name'] != '') {
		move_uploaded_file ($_FILES ['imagem_visual']['tmp_name'], $foto_v);
	}

	if (isset ($_FILES ['imagem_tatil']) && $_FILES ['imagem_tatil']['name'] != '') {
		$foto_t = "assets/img/tatil/".time().'_'.basename ($_FILES ['imagem_tatil']['name']);
	}
	else{
		return -1;
	}
	
	if (isset ($_FILES ['imagem_tatil']) && $_FILES ['imagem_tatil']['name'] != '') {
		move_uploaded_file ($_FILES ['imagem_tatil']['tmp_name'], $foto_t);
	} 
	
	//armazenando informação no banco de dados
	try{
		$pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);//Ativa o lançamento de exceptions para erros
		$pdo->beginTransaction(); //inicia uma transação
		
		$u->enviar($titulo,$descricao,$foto_v,$foto_t,$status); //chamada função armazenamento tabela arquivo
		
		//Tratamento em armazenamento tabela tag
		$newtag = preg_replace('/[^\w]+/'," ",$tag);
		foreach(explode(" ",trim($newtag)) as $values){
			$sql = $pdo->prepare('INSERT INTO tag (key_words, id_arquivo_fk) VALUES (:kw,:fka)');
			$sql->bindValue(":kw", $values);
			$sql->bindValue(":fka", $_SESSION['id_arquivo']);
			$sql->execute();
		}

			//Percorrer tabela do formulario de nivel, e disciplina
			$e=0;
			while(isset($_POST['nivel_'.$e])){
				//Recupera o id do nivel de escolaridade
				$nivel = $_POST['nivel_'.$e];
				$sql= $pdo->prepare("SELECT id_escolaridade FROM escolaridade WHERE nivel=:n");
				$sql->bindValue(":n", $nivel);
				$sql->execute();
				$dado = $sql->fetchAll(PDO::FETCH_OBJ);
				$id_escolaridade = (int)$dado[0]->id_escolaridade;
				//Recupera o id da disciplina
				$disciplina=$_POST['disciplina_'.$e];
				$sql= $pdo->prepare("SELECT id_disciplina FROM disciplina WHERE nome_disciplina=:dc");
				$sql->bindValue(":dc", $disciplina);
				$sql->execute();
				$dado = $sql->fetchAll(PDO::FETCH_OBJ);
				//Se a disciplina retornar null insere, senão recupera o id da disciplina
				if($dado == null){
					//Inserida a disciplina no banco
					$sql = $pdo->prepare('INSERT INTO disciplina (nome_disciplina) VALUES (:nd)');
					$sql->bindvalue(":nd", $disciplina);
					$sql->execute();
					//Recupera o id da disciplina inserida
					$disciplina=$_POST['disciplina_'.$e];
					$sql= $pdo->prepare("SELECT id_disciplina FROM disciplina WHERE nome_disciplina=:dc");
					$sql->bindValue(":dc", $disciplina);
					$sql->execute();
					$dado = $sql->fetchAll(PDO::FETCH_OBJ);
					$id_disciplina = (int)$dado[0]->id_disciplina;
				}else{ 
					$id_disciplina = (int)$dado[0]->id_disciplina;
				}
				//REcupera o id da associação escolaridade/disciplina
				$sql= $pdo->prepare("SELECT id_assoc_ed FROM assoc_ed WHERE id_disciplina_fk=:fkd AND id_escolaridade_fk=:fke");
				$sql->bindValue(":fkd", $id_disciplina);
				$sql->bindValue(":fke", $id_escolaridade);
				$sql->execute();
				$dado = $sql->fetchAll(PDO::FETCH_OBJ);
				//Se a associação retorna null insere, senão recupera o id da associação
				if($dado == null){
					//Insere associação escolaridade/disciplina
					$sql = $pdo->prepare('INSERT INTO assoc_ed (id_disciplina_fk, id_escolaridade_fk) VALUES (:fkd,:fke)');
					$sql->bindValue(":fkd", $id_disciplina);
					$sql->bindValue(":fke", $id_escolaridade);
					$sql->execute();
					//Recupera o id da associação inserida
					$sql= $pdo->prepare("SELECT id_assoc_ed FROM assoc_ed WHERE id_disciplina_fk=:fkd AND id_escolaridade_fk=:fke");
					$sql->bindValue(":fkd", $id_disciplina);
					$sql->bindValue(":fke", $id_escolaridade);
					$sql->execute();
					$dado = $sql->fetchAll(PDO::FETCH_OBJ);
					$id_esc_disc = (int)$dado[0]->id_assoc_ed;
				}else{
					$id_esc_disc = (int)$dado[0]->id_assoc_ed;		
				}
				//Insere a associação arquivo/ed
				$sql = $pdo->prepare('INSERT INTO assoc_arquivo (id_arquivo_fk, id_assoc_ed_fk) VALUES (:fka,:fke)');
				$sql->bindValue(":fka", $_SESSION['id_arquivo']);
				$sql->bindValue(":fke", $id_esc_disc);
				$sql->execute();

				$e++;
			}

	$pdo->commit(); //envia uma transação
	header ("Location: inicio.php"); 

	}catch(PDOException $exception){
		$pdo->rollback();  //reverte uma transação
		die('Erro ao armamzenar');
	}

?>
 