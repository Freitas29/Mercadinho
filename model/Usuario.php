<?php
include 'Pessoa.php';
class Usuario extends Pessoa{
    private $sacar;
    private $depositar;
    private $senha;
    public function setSacar(float $sacar){
        $this->sacar = $sacar;
    }

    public function getSacar():float{
        return $this->sacar;
    }

    public function setDepositar(float $depositar){
        $this->depositar = $depositar;
    }

    public function getDepositar():float{
        return $this->depositar;
    }

    public function setSenha(String $senha){
        $this->senha = $senha;
    }

    public function getSenha():String{
        return $this->senha;
    }
}

?>