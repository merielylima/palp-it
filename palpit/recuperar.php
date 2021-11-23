<?php
    require_once 'classes/usuarios.php';
    $u = new Usuarios;
    include('email.php');
    include('head.php');

    $u->conectar(); //conexão banco de dados

    if(isset($_POST['email'])){//Verifica se a variavel foi iniciada
        $token = uniqid();//A função uniqid() do PHP para gerar uma chave única que o usuário irá receberar no email.
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['token'] = $token;
        
        //Verifica se o email digitado no campo email existe no banco de dados
        $sql = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
        $sql->execute([$_SESSION['email']]);
        
        if($sql->rowCount() == 1){
            $info = $sql->fetch();
                    
            $url = 'http://localhost/palp-it/palpit/reset_senha_senha.php';//url para redefinição
            //Corpo da mensagem do email
            $corpo = 'Olá '.$info['nome'].', <br>
            Foi solicitada uma redefinição da sua senha na "PALP-it". Acesse o link abaixo para redefinir sua senha.<br>
            <h3><a href="'.$url.'?token='.$_SESSION['token'].'&email='.$_SESSION['email'].'">Redefinir a sua senha</a></h3> 
            <br>            
            Caso você não tenha solicitado essa redefinição, ignore esta mensagem.<br>
            Qualquer problema ou dúvida entre em contato pelo email contato@contato.com';

            $mail = smtpmailer ($_POST ['email'], 'baille.hub@gmail.com', 'PALP-it', 'Redefinição de senha PALP-it', $corpo);
            
            if($mail){
                $sql = $pdo->prepare("UPDATE usuario SET confirmacao=:c WHERE email=:e");
                $sql->bindValue(":c", ($token));
                $sql->bindValue(":e", ($_POST['email']));
                $sql->execute();
?><!--HTML para quando email for enviado!-->
            <body>
                <main class="container container-xs">
                    <div class="content flex flex--centro flex--coluna mt7">
                        <section class=" cartao--container cartao-xs">
                            <div class="border-bottom">
                                <img src="assets/img/icon/Logo-palp-it.svg" alt="Logo Palp-it"/>
                                <h2 class="container--titulo">Recuperar senha</h2> 
                            </div>
                            <p class="justificado my-3">  Um email de confirmação foi enviado para o endereço <a class="link" > <?php echo $_SESSION['email'] ?> </a>. </p>
                            <button class="botao--container botao--primario width-full"> <a href="inicio.php" >Voltar para página inicial</a></button>
                        </section>
                    </div>
                </main>
                </body>
            </html>
<?php
            }else{
                die('Erro ao enviar o email de confirmação contacte palp-it@ufpa.br');
            }
            
        }else{
            die('Não encontramos esse ' .$_SESSION['email'].' em nossa base de dados.');
        } 
    }
?>

