<?php
class Banco{
    private $conexao;
    private $resultado;
    public function conectar(){
        try{
            $end = "mysql:host=127.0.0.1;dbname=mercado";
            $this->conexao = new PDO($end, "root","");
            $this->conexao->exec("set names utf8");
        }catch(PDOException $e){
            echo "Não foi possivel conectar";
            echo $e->getMessage();
            $this->conexao = null;
        }
        return $this->conexao;
    }

    public function desconectar():boll{
        try{
            $this->$conexao = null;
            return true;
        }catch(Exception $e){
            echo "Não foi possivel fechar";
            return false;
        }
    }

        
}
?>