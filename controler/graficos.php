<?php
include_once '../libs/Banco.php';
include_once '../model/Vendas.php';

$vendas = new Vendas();


$qtdVendas = $vendas->qtdVendidos();
$p = array();
$qtd = array();
foreach($qtdVendas as $v){
    array_push($p,$v['nome']);
    array_push($qtd,$v['qtdVendidos']);
}
$produtos = json_encode($p);
$quantidade = json_encode($qtd);
echo $produtos;
echo $quantidade;
?>