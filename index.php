<?php

require 'Usuario.php';

$objUsuario = new Usuario();

if(isset($_POST['cadastar'])){
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $objUsuario->nome = $nome;
    $objUsuario->senha = $senha;

    $res = $objUsuario->cadastrar();

    if($res){
        echo '<script> alert("Cadastro com sucesso") </script>';
    }else{
        echo '<script> alert("Falha no Cadastro") </script>';
    }
}

$usuarios = [];

if(isset($_POST['listar'])){
    $usuarios = $objUsuario->listar_todos();
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div>
        <form method="POST">
            <input type="hidden" id="id" name="id">            
            <input type="text" id="nome" name="nome">            
            <input type="text" id="senha" name="senha">
            <button type="submit" name="cadastar" id="submitButton">Cadastar</button>
        </form>    
    </div>

    <div>
        <form method="POST">            
            <button type="submit" name="listar" id="submitButton">Listar</button>
        </form>    
    </div>
    
    
</body>
</html>