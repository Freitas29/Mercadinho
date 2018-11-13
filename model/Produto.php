<?php

class Produto{
    private $preco;
    private $id;
    private $nome;
    private $categoria;

    public function setId(String $id){
        $this->id = $id;
    }

    public function getId():int{
        return $this->id;
    }

    public function setNome(String $nome){
        $this->nome = $nome;
    }

    public function getNome():String{
        return $this->nome;
    }

    public function setPreco(float $preco){
        $this->preco = $preco;
    }

    public function getPreco():float{
        return $this->preco;
    }

    public function setCategoria(String $categoria){
        $this->categoria = $categoria;
    }

    public function getCategoria():String{
        return $this->categoria;
    }
}

?>