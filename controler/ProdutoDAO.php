<?php
include_once '../libs/Banco.php';
include_once '../model/Produto.php';
$p = new Produto();
$pDAO = new ProdutoDAO();


if (!isset($_POST['op'])) {
    $op = 0;
}else{
    $op = $_POST['op'];
}

switch ($op) {
    case 1:
        $id = $_POST['id'];
        $p->setId($id);
        $a = $pDAO->pesquisarId($p);
        foreach ($a as $l) {
            $produto = array(
                'id' => $l['id'],
                'nome' => $l['nome'],
                'preco' => $l['preco'],
            );
        }
        echo json_encode($produto);
        break;
    
    default:
        # code...
        break;
}
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
            echo $e->getMessage();
            echo "Erro ao inserir um produto novo";
            return false;
        }
    }

    public function pesquisarProduto(Produto $p){
        $c = $p->getCategoria();
        $i = $p->getId();
        $n = $p->getNome();
        $sql = "SELECT * FROM produto WHERE nome LIKE '$n%' OR categoria LIKE '$c%' OR id LIKE '$i%'";
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