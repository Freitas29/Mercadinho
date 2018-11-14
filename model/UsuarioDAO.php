<?php
include_once '../libs/Banco.php';
include_once '../model/Usuario.php';
session_start();
$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$usuario->setNome($nome);
$usuario->setSenha($senha);
echo  $usuarioDAO->login($usuario);
class UsuarioDAO{
    
    private $sql;
    private $bd;
    private $st;
    private $resultado;
    private $conn;
    public function inserirUsuario(Usuario $usu):bool{
        $sql = "INSERT INTO usuario(nome,senha,dataNasc)values(:n,:s,now())";
        try{
            $this->bd = new Banco();
            $this->conn = $this->bd->conectar();
            $this->st = $this->conn->prepare($sql);
            $this->st->bindValue(":n",$usu->getNome());
            $this->st->bindValue(":s",$usu->getSenha());
            $this->st->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
        $this->bd->desconectar();
    }

    public function login(Usuario $usu){
        $sql = "SELECT id,nome FROM usuario WHERE nome = :n and senha = :s";
        try{
            $this->bd = new Banco();
            $this->conn = $this->bd->conectar();
            $this->st = $this->conn->prepare($sql);
            $this->st->bindValue(":n",$usu->getNome());
            $this->st->bindValue(":s",$usu->getSenha());
            $this->st->execute();
            $this->resultado = $this->st->rowCount();
            $pessoa = $this->st->fetchALL(PDO::FETCH_ASSOC);

            if($this->resultado == 1){
                foreach ($pessoa as $l) {
                    $nome = $l['nome'];
                    $id = $l['id'];
                    $_SESSION['login'] = $id;
                    $_SESSION['nome'] = $nome;
                    return true;
                 }

                 return;
            }else{
                return  false;
                
            }
        }catch(PDOException $e){
            echo $e->getMessage();
            echo "Falha no comando";
        }
        $this->bd->desconectar();
    }

    public function alterarNome(Usuario $usu){
        $sql = "UPDATE usuario SET nome = :n";
        try{
            $this->bd = new Banco();
            $this->conn = $this->bd->conectar();
            $this->st = $this->conn->prepare($sql);
            $this->st->bindValue(":n",$usu->getNome());
            $this->st->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
            echo "Falha ao alterar o nome";
        }
    }
}

?>