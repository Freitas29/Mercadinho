<?php
include_once '../model/Usuario.php';
include_once '../controler/UsuarioDAO.php';
$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$usuario->setNome($nome);
$usuario->setSenha($senha);
$valor =  $usuarioDAO->login($usuario);
echo "pINTOOOO".$valor;
?>