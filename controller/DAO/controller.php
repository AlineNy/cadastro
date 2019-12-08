<?php
require_once("../../config.php");

class Controller extends Cadastro{

    function create(){

        $conexao = new Sql();
        $cliente = new Cliente();

        $nome = get($cliente->nome);
        $dtNascimento = get($cliente->dtNascimento);
        $sexo = get($cliente->sexo);


        $statement = $conexao->prepare("INSERT INTO cliente (nome, dtNascimento) VALUES (:NOME, :DTNASCIMENTO)");
        $statement = $conexao->prepare("INSERT INTO sexo (nome, dtNascimento) VALUES (:SEXO)");

        $statement->bindParam(":NOME", $nome);
        $statement->bindParam(":DTNASCIMENTO", $dtNascimento);
        $statement->bindParam(":SEXO", $sexo);

        $statement->execute();

        echo "Adicionado com sucesso!";

    }

    
    function update(){

        $conexao = new Sql();
        $cliente = new Cliente();

        $nome = get($cliente->nome);
        $dtNascimento = get($cliente->dtNascimento);
        $sexo = get($cliente->sexo);
        $id = get($cliente->id);

        $statement = $conexao->prepare("UPDATE cliente SET nome = :NOME, dtNascimento = :DTNASCIMENTO) WHERE idcliente = :ID");
        $statement = $conexao->prepare("UPDATE  sexo SET sexo = :SEXO) WHERE idcliente = :ID");

        $statement->bindParam(":NOME", $nome);
        $statement->bindParam(":DTNASCIMENTO", $dtNascimento);
        $statement->bindParam(":SEXO", $sexo);
        $statement->bindParam(":ID", $id);

        $statement->execute();

        echo "Alterado com sucesso!";

    }

    
    function delete(){

        $conexao = new Sql();
        $cliente = new Cliente();

        $id = get($cliente->id);

        $statement = $conexao->prepare("DELETE FROM cliente WHERE idcliente = :ID");

        $statement->bindParam(":ID", $id);

        $statement->execute();

        echo "Deletado com sucesso!";

    }

    
    public static function read(){
       
        $conexao = new Sql();

        return $conexao->select("SELECT * FROM cliente ORDER BY nome;");

        echo "Listando com sucesso!";
    }

    public function loadById($id){

        $conexao = new Sql();
        $conexao = new Sql();

        $results = $conexao->select("SELECT * FROM cliente WHERE idcliente = :ID", array(
            ":ID"=>$id
        ));

        if(isset($results > 0)){

            $row = $results[0];

            $this->setId($row['idcliente']);
            $this->setNome($row['nome']);
            $this->setSexo($row['sexo']);
            $this->setDtNascimento(new DateTime($row['dtNascimento']));

        }

    }

    public function __toString(){

        return json_encode(array(
            "idcliente"=>$this->getId(),
            "nome"=>$this->getNome(),
            "sexo"=>$this->getSexo(),
            "dtNascimento"=>$this->getDtNascimento()->format("d/m/Y H:i:s");

        )) 
    }

}
?>