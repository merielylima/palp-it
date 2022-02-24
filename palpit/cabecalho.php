<?php

include ("head.php");
require_once 'classes/Functions.php';
$f = new Functions;

/*
    if (session_status() !== PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
        session_start();
    }

    if(isset($_SESSION["id_usuario"])){ //Verificando se variavel foi iniciada
    //true;
    include ("cabecalho_logado.php");
    }else{
    //false;
    session_destroy();
    include ("cabecalho_deslogado.php");
    }
*/
?>

<?php if($f->logado()):?>
    
    <!-- CABEÇALHO LOGADO!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
    <header class="cabecalho">
        <div class="cabecalho__content">
            <div class="cabecalho__left-side flex flex-items-center">
                <a href="inicio.php" class=" flex">
                    <img src="assets/img/icon/Logo-palp-it.svg" alt="Logo Palp-it"/>
                </a>
                <div class="cabecalho--pesquisa">
                    <input type="search" placeholder="Pesquisar" class=" input-pesquisa">
                </div>
                <nav class="cabecalho--navegacao items-xl">
                    <ul class="flex flex-items-center">
                        <li id="btn-inicio" class="botao--container ">
                            <a href="inicio.php"><span class="material-icons ">home</span> Início</a>
                        </li>
                        <li id="btn-perfil" class="botao--container">
                            <a href="perfil.php"> <span class="material-icons">person</span> Perfil</a>
                        </li>
                        <li id="btn-contribuicoes" class="botao--container">
                            <a href="contribuicoes.php"><span class="material-icons">file_upload</span> Contribuições</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="items-xl cabecalho__right-side flex">
                <div class=" botao-cabecalho botao--container border">
                    <a href="envio.php">
                    <span class="material-icons">add</span> 
                    Novo envio
                    </a>
                </div>
                <span class="material-icons notifications">notifications_none </span>
                <div id="menu_popup" class="user__menu "> 
                <button  class="dropbtn">
                    <img class="user__menu--photo" src=<?php echo '"'.$_SESSION ['foto_p'].'"'?>  alt="Foto de perfil">
                    <span class="material-icons">expand_more</span>
                </button>
                </div>
            </div>
            <div id="js-menu" class="botao--container menu">
                <span class="menu-icon material-icons">menu</span>
            </div>
        </div>
        <div id="myDropdown" class="caixa">
            <ul onclick="myFunction()">
                <li><a href="#" class="">Editar Perfil</a></li>
                <li><a href="logout.php" class="">Sair</a></li>
            </ul>
        </div>
    </header>
<script src="js/cabecalho.js"></script>        

<?php else:?>

    <!-- CABEÇALHO DESLOGADO!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
    <header class="cabecalho">
        <div class="cabecalho__content">
            <div class="cabecalho__left-side flex flex-items-center">
                <a href="inicio.php" class=" flex">
                    <img src="assets/img/icon/Logo-palp-it.svg" alt="Logo Palp-it"/>
                </a>
                <div class="cabecalho--pesquisa ">
                    <input type="search" placeholder="Pesquisar" class="search-icon input-pesquisa botao--container border">
                </div>
            </div>
            <div class="cabecalho__right-side">
                <nav>
                    <ul class="flex">
                        <li> 
                            <a href="login.php"class="botao--container"> Entrar </a>
                        </li>
                        <li> 
                            <a href="cadastro.php"  class="botao--container border " > Criar conta </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

<?php endif;?>
