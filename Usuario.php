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

    public function deletar($id){
        try{
            $db = new Database("user");
            $res = $db->delete('id = '.$id);

            return $res;

        }catch(\throwable $th){
            echo "<script>console.log('ERRO Delete: " . $th->getMessage() . "' );</script>";
        }
    }

    public function atualizar(){
       try{
            $db = new Database('user');
            $res = $db->update('id = '.$this->id, [
                'nome'=> $this->nome,
                'senha'=> $this->senha                
            ]);
            return $res;

       }catch(\Throwable $th){
            echo "<script>console.log('ERRO atualizar: " . $th->getMessage() . "' );</script>";
       } 
    }




}







?>