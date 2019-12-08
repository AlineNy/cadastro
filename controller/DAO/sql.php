<?php

class Sql extends PDO {

    private $conexao;

    public function __construct()
    {

        $this-> $conexao = new PDO("mysql:dbname=feedz;host=localhost", "root", "root");
    }

    private function setParams($stmt, $parameters = array())
    {

        foreach($parameters as $key => $value){

            $this->setParam($key, $value);

        }
    }

    private function setParam($stmt, $key, $value)
    {

        $stmt->bindParam($key, $value);
    }

    public function query($rawQuery, $params = array())
    {

        $statement = $this->conexao-.prepare($rawQuery);

        $this->setParams($statement, $params);

        $statement->execute();
        
        return $statement;

    }

    public function select($rawQuery, $params = array())
    {

        $statement = $this->query($rawQuery, $params);

        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }
}
?>