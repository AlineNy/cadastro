<?php

class Controller extends Cadastro{

$conexao = new Conexao();
$cliente = new Cliente();

    function create(){

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

    
    function alter(){

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

        $id = get($cliente->id);

        $statement = $conexao->prepare("DELETE FROM cliente WHERE idcliente = :ID");

        $statement->bindParam(":ID", $id);

        $statement->execute();

        echo "Deletado com sucesso!";

    }

    
    function list(){

        $nome = get($cliente->nome);
        $dtNascimento = get($cliente->dtNascimento);
        $sexo = get($cliente->sexo);
        $id = get($cliente->id);

        $statement = $conexao->prepare("INSERT INTO cliente (nome, dtNascimento) VALUES (:NOME, :DTNASCIMENTO)");
        $statement = $conexao->prepare("INSERT INTO sexo (nome, dtNascimento) VALUES (:SEXO)");

        $statement->bindParam(":NOME", $nome);
        $statement->bindParam(":DTNASCIMENTO", $dtNascimento);
        $statement->bindParam(":SEXO", $sexo);

        $statement->execute();

        echo "Listando com sucesso!";
    }

}
?>