<?php
 include ("head.php");
?>
<body>
    <main class="center container-xs">
        <div class="flex flex--coluna px3">
            <section class=" cartao--container cartao-xs">
                <div class="border-bottom">
                    <img src="assets/img/icon/Logo-palp-it.svg" alt="Logo Palp-it"/>
                    <h2 class="container--titulo mb-2">Cadastre-se no Palp-it</h2>
                </div>
                <div>
                    <form action="cadastro_analise.php" method="POST">
                        <div class="input-container">
                            <input name="nome" id="nome" class="input input-full" type="text" placeholder="Nome" required>
                            <!-- <span class="input-mensagem-erro">Este campo não está válido</span> -->
                        </div>
                        <div class="input-container">
                            <input name="email" id="email" class="input input-full" type="email" placeholder="Email" required>
                            <!-- <span class="input-mensagem-erro">Este campo não está válido</span> -->
                        </div>
                        <div class="input-container">
                            <input name="senha" id="senha" class="input input-full" type="password" placeholder="Senha" title="A senha deve conter entre 6 a 12 caracteres, deve conter pelo menos uma letra maiúscula, um número e não deve conter símbolos." required>
                            <!-- <span class="input-mensagem-erro">Este campo não está válido</span> -->
                        </div>
                        <div class="input-container">
                            <input name="senha" id="senha" class="input input-full" type="password" placeholder="Confirmação de senha" title="A senha deve conter entre 6 a 12 caracteres, deve conter pelo menos uma letra maiúscula, um número e não deve conter símbolos." required>
                            <!-- <span class="input-mensagem-erro">Este campo não está válido</span> -->
                        </div>
                        <div class="input-container"> 
                            <label id="area" class="input--label">Área de interesse</label>
                            <select class="option input  input-full" name="area">        
                                <option value="0">Ciências exatas</option>
                                <option value="1">Ciências humanas</option>
                                <option value="2">Ciências econômicas</option>
                                <option value="3">Ciências da saúde</option>
                            </select>
                        </div>
                        <label class="checkbox--label ">
                            <input type="checkbox" name="receber" checked> 
                            Receber uma notificação por email quando um novo gráfico da minha área de interesse for postado.
                        </label>
                        <button class="botao--container botao--primario width-full"> Cadastrar </button>
                    </form>
                </div>
            </section>
            <section class=" cartao--container cartao-xs">
                <p> Já é membro?</p> <a href="login.php" class="link link-externo"> Entre já </a>
            </section>
        </div>
    </main>
    <script src="./js/validacao.js"></script>
</body>
