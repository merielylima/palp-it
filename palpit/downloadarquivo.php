<?php
// Define o tempo máximo de execução em 0 para as conexões lentas
set_time_limit(0);

// Arqui você faz as validações e/ou pega os dados do banco de dados
require_once 'classes/usuarios.php';
$u = new Usuarios;
$u->conectar();
$id_arquivo = $_GET['id_arquivo'];

$soma_download=$pdo->prepare("UPDATE arquivo a SET a.q_download= a.q_download+1 WHERE id_arquivo=$id_arquivo");
$soma_download->execute();

$sql= $pdo->prepare("SELECT a.foto_t FROM arquivo a WHERE id_arquivo=$id_arquivo");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_OBJ);
$arquivoLocal =(string)$resultado[0]->foto_t;
//$arquivoLocal = '/pasta/do/arquivo/'.$aquivoNome; // caminho absoluto do arquivo

// Verifica se o arquivo não existe
if (!file_exists($arquivoLocal)) {
// Exiba uma mensagem de erro caso ele não exista
exit;
}

// Configuramos os headers que serão enviados para o browser
//header($_SERVER['SERVER_PROTOCOL'].' 200 OK');
header("Content-Type: application/zip");
header("Content-Transfer-Encoding: Binary");    
header("Content-Length: ".filesize($arquivoLocal)); 
header("Content-Disposition:attachment;filename=\"".basename($arquivoLocal)."\"");

// Envia o arquivo para o cliente
while (ob_get_level()) 
{
 ob_end_clean();
 }
readfile($arquivoLocal);   
exit;
ob_start ();