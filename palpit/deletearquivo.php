<?php
   require_once 'classes/usuarios.php';
   $u = new Usuarios;
   $u->conectar();

   $id_arquivo = $_GET['id_arquivo'];

   $cam_arquivo= $pdo->prepare("SELECT foto_v, foto_t FROM palpit.arquivo WHERE id_arquivo = $id_arquivo");
   $cam_arquivo->execute();
   $resultado = $cam_arquivo->fetchAll(PDO::FETCH_OBJ);
   unlink($resultado[0]->foto_v);
   unlink($resultado[0]->foto_t);

   $sql= $pdo->prepare("DELETE FROM palpit.arquivo WHERE id_arquivo = $id_arquivo");
   $sql->execute();

   header("location: index.php");//encaminhado para index
 ?>
