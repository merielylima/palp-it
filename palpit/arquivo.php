<?php
  require_once 'classes/usuarios.php';
  $u = new Usuarios;
  
  session_start();
  
  $u->conectar(); //conectando ao banco
  
  $titulo = addslashes($_POST['titulo']);
  $descricao = addslashes($_POST['descricao']);
  $tag = addslashes($_POST['palavra-chave']);
  $foto_v;
  $foto_t;


  	if (isset ($_FILES ['imagem_visual']) && $_FILES ['imagem_visual']['name'] != '') {
	$foto_v = "visual/".time().'_'.basename ($_FILES ['imagem_visual']['name']);
	}
	else{
		return -1;
	}

	if (isset ($_FILES ['imagem_visual']) && $_FILES ['imagem_visual']['name'] != '') {
		move_uploaded_file ($_FILES ['imagem_visual']['tmp_name'], $foto_v);
	}

	if (isset ($_FILES ['imagem_tatil']) && $_FILES ['imagem_tatil']['name'] != '') {
		$foto_t = "tatil/".time().'_'.basename ($_FILES ['imagem_tatil']['name']);
	}
	else{
		return -1;
	}
	
	if (isset ($_FILES ['imagem_tatil']) && $_FILES ['imagem_tatil']['name'] != '') {
		move_uploaded_file ($_FILES ['imagem_tatil']['tmp_name'], $foto_t);
	} 
	
	try{
		$pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);//Ativa o lançamento de exceptions para erros
		$pdo->beginTransaction();
		
		$u->enviar($titulo,$descricao,$foto_v,$foto_t);

		$newtag = preg_replace('/\W{2,}/'," ",$tag);
		foreach(explode(" ",trim($newtag,)) as $values){
			$sql = $pdo->prepare('INSERT INTO tag (key_words, id_arquivo_fk) VALUES (:kw,:fka)');
			$sql->bindValue(":kw", $values);
			$sql->bindValue(":fka", $_SESSION['id_arquivo']);
			$sql->execute();
		}

			$e=0;
			//adiciona nivel e disciplina de acordo quantidade da tabela
			while(isset($_POST['nivel_'.$e])){
				//recupero id da escolaridade
				$nivel = $_POST['nivel_'.$e];
				$sql= $pdo->prepare("SELECT id_escolaridade FROM escolaridade WHERE nivel=:n");
				$sql->bindValue(":n", $nivel);
				$sql->execute();
				$dado = $sql->fetchAll(PDO::FETCH_OBJ);
				$id_escolaridade = (int)$dado[0]->id_escolaridade;
				//recupero id de disciplina
				$disciplina=$_POST['disciplina_'.$e];
				$sql= $pdo->prepare("SELECT id_disciplina FROM disciplina WHERE nome_disciplina=:dc");
				$sql->bindValue(":dc", $disciplina);
				$sql->execute();
				$dado = $sql->fetchAll(PDO::FETCH_OBJ);
				//$id_disciplina = (int)$dado[0]->id_disciplina;
				//Se a disciplina nao existir no banco retorna null 
				if($dado == null){
					//Inserir nova disciplina
					$sql = $pdo->prepare('INSERT INTO disciplina (nome_disciplina) VALUES (:nd)');
					$sql->bindvalue(":nd", $disciplina);
					$sql->execute();
					//recupero id da disciplina
					$disciplina=$_POST['disciplina_'.$e];
					$sql= $pdo->prepare("SELECT id_disciplina FROM disciplina WHERE nome_disciplina=:dc");
					$sql->bindValue(":dc", $disciplina);
					$sql->execute();
					$dado = $sql->fetchAll(PDO::FETCH_OBJ);
					$id_disciplina = (int)$dado[0]->id_disciplina;
				}else{ 
					$id_disciplina = (int)$dado[0]->id_disciplina;
				}
				//recupero id da associação disciplina escolalridade
				$sql= $pdo->prepare("SELECT id_assoc_ed FROM assoc_ed WHERE id_disciplina_fk=:fkd AND id_escolaridade_fk=:fke");
				$sql->bindValue(":fkd", $id_disciplina);
				$sql->bindValue(":fke", $id_escolaridade);
				$sql->execute();
				$dado = $sql->fetchAll(PDO::FETCH_OBJ);
				//Se a associação nao existe retorna null
				if($dado == null){
					//Inserir associação disciplina/escolaridade
					$sql = $pdo->prepare('INSERT INTO assoc_ed (id_disciplina_fk, id_escolaridade_fk) VALUES (:fkd,:fke)');
					$sql->bindValue(":fkd", $id_disciplina);
					$sql->bindValue(":fke", $id_escolaridade);
					$sql->execute();
					//recupero id disciplina escolaridade
					$sql= $pdo->prepare("SELECT id_assoc_ed FROM assoc_ed WHERE id_disciplina_fk=:fkd AND id_escolaridade_fk=:fke");
					$sql->bindValue(":fkd", $id_disciplina);
					$sql->bindValue(":fke", $id_escolaridade);
					$sql->execute();
					$dado = $sql->fetchAll(PDO::FETCH_OBJ);
					$id_esc_disc = (int)$dado[0]->id_assoc_ed;
				}else{
					$id_esc_disc = (int)$dado[0]->id_assoc_ed;		
				}
				$sql = $pdo->prepare('INSERT INTO assoc_arquivo (id_arquivo_fk, id_assoc_ed_fk) VALUES (:fka,:fke)');
				$sql->bindValue(":fka", $_SESSION['id_arquivo']);
				$sql->bindValue(":fke", $id_esc_disc);
				$sql->execute();

				$e++;
			}

	$pdo->commit();
	
	}catch(PDOException $exception){
		$pdo->rollback();
		die('Erro ao armamzenar');
	}

?>
 