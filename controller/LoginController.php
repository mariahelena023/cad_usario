<?php
require_once __DIR__ . '/../database/Database.php';

Class LoginController{

    private $conn;

    public function __construct(){
        $db = new Database("user");
        $this->conn = $db->connect(); //TEMOS QUE CRIAR
    }

    public function validarSenha($nome, $senha){
        try{
            $query = "SELECT * FROM  user WHERE nome = :nome AND senha = :senha";
            $db = $this->conn->prepare($query);
            $db->bindParam(":nome", $nome);
            $db->bindParam(":senha", $senha);
            $db->execute();
            $users = $db->fetchAll(PDO::FETCH_ASSOC);
            var_dump($users);

            if($users){
                session_start();
                $_SESSION["id_usuario"] = $users[0]["id"];
                return true;
            } else{
                return false;
            }
        }catch (Exception $e){
            echo "<script>console.log('ERRO LOGIN: " . $e->getMessage() . "' );</script>";
        }
    }



}

