<?php
 include ("head.php");
 require_once 'classes/usuarios.php';
 $u = new Usuarios;
 $u->conectar();

?>
<body>
    <main class="center container-xs">
        <div class="flex flex-coluna px-3">
            <section class=" cartao__container cartao-xs">
                <div class="border-bottom">
                    <a href="inicio.php">
                        <img src="assets/img/icon/Logo.svg" alt="Logo Palp-it"/>
                    </a> 
                    <h2 class="container--titulo mb-2">Cadastre-se no Palp-it</h2>
                </div>
                <?php if(isset($_SESSION['erro'])):?>
                    <div class="mensagem-erro">
                                <?= $_SESSION['erro'] ?>
                                <?php unset($_SESSION['erro']) ?>
                    </div>
                <?php endif; ?>
                <div>
                    <form action="cadastro_analise.php" method="POST">
                        <div id="div-erro" class="mensagem-erro">
                            <span id="span-erro"></span>
                        </div>
                        <div class="input-container">
                            <input name="nome" id="nome" class="input input-full" type="text" placeholder="Nome" required>
                            
                        </div>
                        <div class="input-container">
                            <input name="email" id="email" class="input input-full" type="email" placeholder="Email" required>
                            
                        </div>
                        <div class="input-container">
                            <input name="senha" id="senha" class="input input-full" type="password" placeholder="Senha" required>
                            
                        </div>
                        <div class="input-container">
                            <input name="senha_confirmacao" id="senha_confirmacao" class="input input-full" type="password" placeholder="Confirmação de senha" title="A senha deve conter entre 6 a 12 caracteres, deve conter pelo menos uma letra maiúscula, um número e não deve conter símbolos." required>
                            
                        </div>
                        <div class="input-container"> 
                            <label class="input--label">Área de interesse</label>
                            <select id="area" class="option input  input-full" name="area">
                                <?php
                                $getarea = $pdo->prepare("SELECT * FROM area ORDER BY id_area");
                                $getarea->execute();
                                while($rows = $getarea->fetch(PDO::FETCH_ASSOC)){
                                    $nome_area = $rows['nome_area'];
                                    $area_id = $rows['id_area'];
                                    echo "<option value='$nome_area'>$nome_area</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <label class="checkbox--label ">
                            <input type="checkbox" id="receber" name="receber"> 
                            Receber uma notificação por email quando um novo gráfico da minha área de interesse for postado.
                        </label>
                        <button type="button" onClick="submitCadastro()" class="botao--container botao--primario width-full"> Cadastrar </button>
                    </form>
                </div>
            </section>
            <section class=" cartao__container cartao-xs">
                <p> Já é membro?</p> <a href="login.php" class="link link-color link-externo"> Entre já </a>
            </section>
        </div>
    </main>
</body>