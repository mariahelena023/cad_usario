<?php

Class Database {

    private $host = "127.0.0.1";
    private $usuario = "root";
    private $senha = "";
    private $db = "cad384";
    private $port = "3306";
    private $tabela;
    private $conn;

    public function __construct($tabela = null) {
        $this->tabela = $tabela;
        $this->conectar();
    }

    public function conectar(){
        try{
            $this->conn = new PDO("mysql:host=".$this->host.
            ";dbname=".$this->db.";", $this->usuario, $this->senha);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\Throwable $th){
            echo "<pre>";
            print_r($th->getMessage());
            echo "</pre";
        }
    }
    public function execute($query, $binds = []){
        try{
            $stmt =  $this->conn->prepare($query);
            $stmt->execute($binds);
            return $stmt;
        }catch (\Throwable $th){
            echo "<pre>";
            print_r($th->getMessage());
            echo "</pre";
        }
    }

    public function insert($values){
        try{
            $fields = array_keys($values);
            $binds = array_fill(0, count($fields),"?");

            $query = 'INSERT INTO '. $this->tabela . '('.implode(',',$fields).') VALUES('. implode(',',$binds).')';
            $res = $this->execute($query, array_values($values));

            return $res ? true: false;
        } catch(\Throwable $th){

        } 
    }

    public function list($fields = '*'){
        try{
            $query = "SELECT ".$fields." FROM ".$this->tabela.";";
            return $this->execute($query);
        }catch(\Throwable $th){
            echo "<pre>";
            echo print_r($query);
            echo "</pre";
        }
    }


}
?>