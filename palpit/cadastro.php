<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palp-it</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="./assets/css/base/base.css">
    <link rel="stylesheet" href="./assets/css/componentes/cartao.css">
    <link rel="stylesheet" href="./assets/css/componentes/inputs.css">
    <link rel="stylesheet" href="./assets/css/componentes/botao.css">
</head>
<body>
    <main class="container container-xs">
        <div class="content flex flex--centro flex--coluna mt7">
            <section class=" cartao--container cartao-xs">
                <div class="">
                    <img src="assets/img/Logo-palp-it.svg" alt="Logo Palp-it"/>
                    <h2 class="container--titulo">Cadastre-se no Palp-it</h2>
                </div>
                <div class="divisao"></div>
                <form action="cadastrar.php" method="POST">
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
            </section>
             <section class=" cartao--container cartao-xs">
                <p> Já é membro?</p> <a href="login.php" class="link link-externo"> Entre já </a>
            </section>
        </div>
    </main>
    <script src="./js/validacao.js"></script>
</body>
</html>
