
<?php
 include ("head.php");
?>

    endif;
?>


<div class="popup-container ">
    <spam> Você deve estar logado para concluir esta etapa.</spam>
    <div class="btn-popup">
        <a href="login.php" class="botao--container botao--primario botao-envio mx-1"> 
            Entrar
        </a>
        <a href="cadastro.php" class="botao--container botao--secundario botao-envio mx-1">
            Cadastrar
        </a>
    </div>
</div>

        <div onclick="open()" class='botao--container btn-excluir'>
              <span id="pp-del" class='material-icons-outlined'>delete </span> Excluir 
            </div>
            ]


            <?php
              if($f->logado() && $dados_arquivo["id_usuario_fk"] == $_SESSION['id_usuario']):
                echo "<a href='downloadarquivo.php?id_arquivo=$id_arquivo' class='botao--container btn-download'>
                  <span class='material-icons-outlined'>file_download </span> Download
              </a>";
              else:
                echo "
            