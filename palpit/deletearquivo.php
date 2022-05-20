<?php
   require_once 'classes/usuarios.php';
   $u = new Usuarios;
   $u->conectar();

   $id_arquivo = $_GET['id_arquivo'];

   $sql= $pdo->prepare("DELETE FROM palpit.arquivo WHERE id_arquivo = $id_arquivo");
   $sql->execute();
  header("location: index.php");//encaminhado para index
 ?>
