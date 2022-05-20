<?php
  require_once 'classes/usuarios.php';
  $u = new Usuarios;
  
  //session_start(); //iniciando sessão
  
  $u->conectar(); //conexão banco de dados
  
	//recuperação das informações formulario
	$nome = addslashes($_POST['user_profile_name']);
  $sobre = addslashes($_POST['user_profile_bio']);
	$cidade = addslashes($_POST['cidade']);
  $area = addslashes($_POST['area']);
  $receber = addslashes(isset($_POST['receber'])) ? true : null;
  $foto_p;

    if (isset ($_FILES ['avatar']) && $_FILES ['avatar']['name'] != '') {
      $foto_p = "assets/img/visual/".time().'_'.basename ($_FILES ['avatar']['name']);
    }
    //else{
      //return -1;
    //}

    if (isset ($_FILES ['avatar']) && $_FILES ['avatar']['name'] != '') {
      move_uploaded_file ($_FILES ['avatar']['tmp_name'], $foto_p);
    }

    $u->alterarperfil($nome,$sobre,$cidade,$receber,$foto_p, $area);
    
    header("Location: perfil.php");

?>
 