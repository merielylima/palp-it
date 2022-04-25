<?php

//namespace classes;

class Functions{
  
    //-----------------------------------------------------------
    public static function logado(){
        //verifica se existe um cliente com sessão
        return isset($_SESSION["id_usuario"]);
    }

}

?>