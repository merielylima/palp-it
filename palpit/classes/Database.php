<?php

//namespace classes;

use Exception;
use PDO;
use PDOException;

class Database{

    private $conexao;
    // -----------------------------------------------------------------
    private function conectar(){
        //conectar a bases de dados
        $this->conexao = new PDO(
            'mysql:'.
            'host='.MYSQL_SERVER.';'.
            'dbname='.MYSQL_DATABASE.';'.
            'charset='.MYSQL_CHARSET,
            MYSQL_USER,
            MYSQL_PASS,
            array(PDO::ATTR_PERSISTENT => true)
        );

        //debug
        $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // -----------------------------------------------------------------
    private function desconectar(){
        //desconectar base de dados
        $this->conexao = null;
    }

    // -----------------------------------------------------------------
    // CRUD
    // -----------------------------------------------------------------
    public function select($sql, $parametros = null){

        $sql = trim($sql);

        //verifica se instrução SELECT
        if(!preg_match("/^SELECT/i",$sql)){
            throw new Exception('Base de dados - Não é uma instrução SELECT.');
        }

        //conecta base de dados
        $this->conectar();

        $resultados = null;

        //comunicação com base de dados
        try {
            if(!empty($parametros)){
                $executar = $this->conexao->prepare($sql);
                $executar -> execute($parametros);
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            }else{
                $executar = $this->conexao->prepare($sql);
                $executar -> execute();
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            }

        } catch (PDOException $e) {
            //caso erro
            return false;

        }
        //desconecta base de dados
        $this->desconectar();

        return $resultados;
    }

    // -----------------------------------------------------------------
    public function insert($sql, $parametros = null){

        $sql = trim($sql);

        //verifica se instrução INSERT
        if(!preg_match("/^INSERT/i",$sql)){
            throw new Exception('Base de dados - Não é uma instrução INSERT.');
        }

        //conecta base de dados
        $this->conectar();

        //comunicação com base de dados
        try {
            if(!empty($parametros)){
                $executar = $this->conexao->prepare($sql);
                $executar->execute($parametros);
            }else{
                $executar = $this->conexao->prepare($sql);
                $executar -> execute();
            }

        } catch (PDOException $e) {
            //caso erro
            return false;

        }
        //desconecta base de dados
        $this->desconectar();
    }

    // -----------------------------------------------------------------
    public function update($sql, $parametros = null){

        $sql = trim($sql);

        //verifica se instrução UPDATE
        if(!preg_match("/^UPDATE/i",$sql)){
            throw new Exception('Base de dados - Não é uma instrução UPDATE.');
        }

        //conecta base de dados
        $this->conectar();

        //comunicação com base de dados
        try {
            if(!empty($parametros)){
                $executar = $this->conexao->prepare($sql);
                $executar -> execute($parametros);
            }else{
                $executar = $this->conexao->prepare($sql);
                $executar -> execute();
            }

        } catch (PDOException $e) {
            //caso erro
            return false;

        }
        //desconecta base de dados
        $this->desconectar();
    }

    // -----------------------------------------------------------------
    public function delete($sql, $parametros = null){

        $sql = trim($sql);

        //verifica se instrução DELETE
        if(!preg_match("/^DELETE/i",$sql)){
            throw new Exception('Base de dados - Não é uma instrução DELETE.');
        }

        //conecta base de dados
        $this->conectar();

        //comunicação com base de dados
        try {
            if(!empty($parametros)){
                $executar = $this->conexao->prepare($sql);
                $executar -> execute($parametros);
            }else{
                $executar = $this->conexao->prepare($sql);
                $executar -> execute();
            }

        } catch (PDOException $e) {
            //caso erro
            return false;

        }
        //desconecta base de dados
        $this->desconectar();
    }
    
    // -----------------------------------------------------------------
    // GENERICA
    // -----------------------------------------------------------------
    public function statement($sql, $parametros = null){

        $sql = trim($sql);

        //verifica se instrução diferente das anteriores
        if(preg_match("/^(SELECT|INSERT|UPDATE|DELETE)/i",$sql)){
            throw new Exception('Base de dados - Não é uma instrução invalida.');
        }

        //conecta base de dados
        $this->conectar();

        //comunicação com base de dados
        try {
            if(!empty($parametros)){
                $executar = $this->conexao->prepare($sql);
                $executar -> execute($parametros);
            }else{
                $executar = $this->conexao->prepare($sql);
                $executar -> execute();
            }

        } catch (PDOException $e) {
            //caso erro
            return false;

        }
        //desconecta base de dados
        $this->desconectar();
    }
}