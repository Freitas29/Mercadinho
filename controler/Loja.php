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
}
?>