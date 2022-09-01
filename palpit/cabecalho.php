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
    <header class="cabecalho ">
        <div class="cabecalho__content">
            <div class="cabecalho__left-side flex flex-items-center">
                <a href="inicio.php" class=" flex">
                    <img src="assets/img/icon/Logo.svg" alt="Logo Palp-it"/>
                </a>
                <div class="cabecalho--pesquisa">
                    <input type="search" placeholder="Pesquisar" class=" input-pesquisa">
                </div>
                <nav class="cabecalho--navegacao items-xl">
                    <ul class="flex flex-items-center">
                        <li id="btn-inicio" class="botao--container <?php if($page_atual == 1){echo ("active");}?>">
                            <a href="inicio.php" class="user__link"> <span class="material-symbols-rounded fill">home</span> Início</a>
                        </li>
                        <li id="btn-perfil" class="botao--container <?php if($page_atual == 2){echo ("active");}?>">
                            <a href="perfil.php" class="user__link"> <span class="material-symbols-rounded fill">person</span> Perfil</a>
                        </li>
                        <li id="btn-contribuicoes" class="botao--container <?php if($page_atual == 3){echo ("active");}?>">
                            <a href="contribuicoes.php" class="user__link "><span class="material-symbols-rounded fill">upload</span> Contribuições</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="items-xl cabecalho__right-side flex">
                <a href="envio.php">
                    <div class=" botao-cabecalho botao--container border">
                        <span class="material-symbols-rounded">add</span> 
                        Novo envio
                    </div>
                </a>
                <!-- <span class="material-icons-outlined notifications">notifications_none </span> -->
                <div class="avt-container avt-cab ml-3">
                    <div class="avt-content">
                        <img class="avt " src=<?php echo '"'.$_SESSION ['foto_p'].'"'?>  alt="Foto de perfil">
                    </div>
                </div>
                <div>
                    <button onclick="myFunction()" class="hover material-symbols-rounded">expand_more</button>  
                    </button>
                    <div id="myDropdown" class="caixa"> 
                        <ul>
                            <li class="caixa-item"><a href="perfil.php?editar=1" >Editar Perfil</a></li>
                            <li class="caixa-item"><a href="logout.php" class="">Sair</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="js-menu" class="botao--container menu">
                <span class="menu-icon material-symbols-rounded">menu</span>
            </div>
        </div>
        
        
    </header>
<script src="js/cabecalho.js"></script>        

<?php else:?>
    <!-- CABEÇALHO DESLOGADO!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
    <header class="cabecalho">
        <div class="cabecalho__content">
            <div class="cabecalho__left-side flex flex-items-center">
                <a href="inicio.php" class=" flex">
                    <img src="assets/img/icon/Logo.svg" alt="Logo Palp-it"/>
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
                        <li > 
                            <a href="cadastro.php"  class="botao--container border " > Criar conta </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
<?php endif;?>
