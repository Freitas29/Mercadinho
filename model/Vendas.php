<?php
class Vendas{
    private $bd;
    private $conn;
    private $st;
    private $sql;

    public function qtdVendidos(){
        $sql = "SELECT * FROM vendidos";
        try{
            $this->bd = new Banco();
           
            $this->conn = $this->bd->conectar();
            $this->st = $this->conn->prepare($sql);
            $this->st->execute();
            return $this->st->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
   