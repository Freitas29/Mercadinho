<?php
session_start();
$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$usuario->setNome($nome);
$usuario->setSenha($senha);
echo  $usuarioDAO->login($usuario);
?>