<?php
    require_once 'classes/usuarios.php';
    $u = new Usuarios;
    $u->conectar();
    include ("head.php");
?>
<html>
    <body>        
        <?php
            if(isset($_GET['token'])){
                $token = $_GET['token'];
                if($token != $_SESSION['token']){
                    die('O token não corresponde');
                }else{
        ?>
        <main class="container container-xs">
            <div class="content flex flex--centro flex--coluna mt7">
            <section class=" cartao--container cartao-xs">
                <div class="border-bottom">
                    <img src="assets/img/icon/Logo-palp-it.svg" alt="Logo Palp-it"/>
                    <h2 class="container--titulo">Recuperar senha</h2>
                </div>
                <form action="redefinir.php">
                <div class="input-container">
                    <input name="senha" id="senha" class="input width-full" type="password" placeholder="Senha" title="A senha deve conter entre 6 a 12 caracteres, com uma letra maiúscula e um número." required>
                    <!--<span class="input-mensagem-erro">Este campo não está válido</span> -->
                </div>
                <div class="input-container">
                    <input name="senha" id="senha" class="input width-full" type="password" placeholder="Confirmação de senha" title=""A senha deve conter entre 6 a 12 caracteres, com uma letra maiúscula e um número." required>
                    <!--<span class="input-mensagem-erro">Este campo não está válido</span> -->
                </div>
                <button class="botao--container botao--primario width-full"> Redefinir senha</button>
                </form>
            </section>
            </div>
        </main>
            <?php
               $sql = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
               $sql->execute([$_SESSION['email']]);
               $info = $sql->fetch();
               
               if($sql->rowCount() == 1){    
                   if(isset($_POST['senha'])){
                        $senha = $_POST['senha'];
                        $criptografada = password_hash($senha, PASSWORD_DEFAULT);
                        $sql = $pdo->prepare("UPDATE usuario SET senha = ? WHERE email = ?");
                        $sql->execute([$criptografada, $_SESSION['email']]);
                        header ("Location: reset_senha_concluido.php");                                              
                   }
               }else{
                   echo 'Não encontramos esse email';
               }  
            ?>
               
        <?php
            }   
        ?>
        <?php
            }else{
                echo 'Precisa de um token';
            }   
        ?>
    </body>
</html>