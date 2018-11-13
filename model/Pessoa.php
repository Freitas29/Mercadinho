<?php

abstract class Pessoa{
    private $nome;
    private $id;
    private $dataNasc;


    public function setNome(String $nome){
        $this->nome = $nome;
    }

    public function getNome():String{
        return $this->nome;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function getId():int{
        return $this->id;
    }

    public function setDataNasc(String $nome){
        $this->nome = $nome;
    }

    public function getDataNasc():String{
        return $this->nome;
    }


}

?>