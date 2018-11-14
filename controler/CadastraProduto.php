<?php
include_once '../libs/Banco.php';
include_once '../model/Produto.php';
include_once '../model/ProdutoDAO.php';
$p = new Produto();
$pDAO = new ProdutoDAO();


if (!isset($_POST['op'])) {
    $op = 0;
}else{
    $op = $_POST['op'];
}

switch ($op) {
    case 1:
    $nome = $_POST['nome'];
    //$qtd = $_POST['qtd'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];
    $p->setNome($nome);
    $p->setPreco($preco);
    $p->setCategoria($categoria);
    $resultado = $pDAO->inserirProduto($p);
    echo $resultado;
    break;
}
?>