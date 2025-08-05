<?php
require 'Database.php';
Class Usuario{
    public $id;
    public $nome;
    public $senha;

    public function cadastrar(){
        $db = new Database("user"); //"user"  é o nome da tabela no banco

        $res = $db->insert(
            [
            "nome"=> $this->nome,
            "senha"=> $this->senha
            ]
        );
        
        return $res;
    }

    public function listar_todos(){
        $db = new Database("user");
        $stmt = $db->list();

        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }






}







?>