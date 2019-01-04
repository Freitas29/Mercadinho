<?php
include_once '../libs/Banco.php';
include_once '../model/Vendas.php';

$vendas = new Vendas();


$qtdVendas = $vendas->qtdVendidos();
$linhas = array();
foreach($qtdVendas as $v){
    array_push($linhas,$v['nome']);
}
echo json_encode($linhas);
?>