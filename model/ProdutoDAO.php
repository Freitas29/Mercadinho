<?php
class ProdutoDAO{
    private $bd;
    private $conn;
    private $st;
    private $sql;
    private $resultado;
    private $linhas,$l;
    public function inserirProduto(Produto $p){
        $sql = "INSERT INTO produto(nome,preco,categoria)VALUES(:n,:p,:c)";
        try{
            $this->bd = new Banco();
            $this->conn = $this->bd->conectar();
            $this->st  = $this->conn->prepare($sql);
            $this->st->bindValue(":n",$p->getNome());
            $this->st->bindValue(":p",$p->getPreco());
            $this->st->bindValue(":c",$p->getCategoria());
            $this->st->execute();
            return true;
        }catch(PDOException $e){
            die("Erro ao gravar produto");
            echo "Messagem de erro: ".$e->getMessage();
            return false;
        }
    }

    public function pesquisarProduto(Produto $p){
        $c = $p->getCategoria();
        $n = $p->getNome();
        $sql = "SELECT * FROM produto WHERE nome LIKE '$n%' OR categoria LIKE '$c%'";
        try{
            $this->bd = new Banco();
            $this->conn = $this->bd->conectar();
            $this->st = $this->conn->prepare($sql);
            $this->st->execute();
            return $this->st->fetchALL(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function listarProdutos(){
        $sql = "SELECT * FROM produto";
        try{
            $this->bd = new Banco();
            $this->conn = $this->bd->conectar();
            $this->st = $this->conn->prepare($sql);
            $this->st->execute();
            return $this->st->fetchALL(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function pesquisarId(Produto $p){
        $id = $p->getId();
        $sql = "SELECT * from produto WHERE id LIKE '$id%'";
        try{
            $this->bd = new Banco();
            $this->conn = $this->bd->conectar();
            $this->st = $this->conn->prepare($sql);
            $this->st->execute();
            return $this->st->fetchALL(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}

?>