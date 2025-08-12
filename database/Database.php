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

    public function connect(){
        return $this->conn;
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
        $stmt = null;
        try{
            $stmt =  $this->conn->prepare($query);
            $stmt->execute($binds);
            return $stmt;
        }catch (\Throwable $th){
            echo "<pre>";
            print_r($th->getMessage());
            echo "</pre";
        }
        return $stmt;
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

    public function delete($where){
        try{
            $query = "DELETE FROM ".$this->tabela." WHERE ".$where;
            $del = $this->execute($query);
            $del = $del->rowCount();

            if($del == 1){
                return true;
            }
            else{
                return false;
            }
        } catch (\throwable $th){
            echo "<script>console.log('ERRO Delete: " . $th->getMessage() . "' );</script>";
        }
    }

    public function update($where, $array){
        try{
            $fields = array_keys($array);
            $values = array_values($array);

            $query = "UPDATE ".$this->tabela." SET ".implode("=?,", $fields)." =? WHERE ".$where;
            $res = $this->execute($query, $values);

            return $res->rowCount();
        }catch (\Throwable $th){

        }
    }
}
?>