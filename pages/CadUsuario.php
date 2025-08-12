<?php

require_once __DIR__ . '/../controller/UsuarioController.php';

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

if(isset($_GET['delete_id'])){
    $id_user = $_GET['delete_id'];
    echo "<script>console.log('ID User: " . $id_user . "' );</script>";
    $objUsuario->deletar($id_user);
    $usuarios = $objUsuario->listar_todos();
}

if(isset($_POST['editar'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $objUsuario->id = $id;
    $objUsuario->nome = $nome;
    $objUsuario->senha = $senha;

    $res =  $objUsuario->atualizar();
    echo '<script> alert("'. ($res ? 'Editado com Sucesso' : 'Não foi Editado') .'") </script>';

    $usuarios = $objUsuario->listar_todos();

}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function carregaDados(id, nome, senha){
            document.getElementById('id').value = id;
            document.getElementById('nome').value = nome;
            document.getElementById('senha').value = senha;            
            document.getElementById('submitButton').name = 'editar';
            document.getElementById('submitButton').innerText = 'Editar';
        }
    </script>
</head>
<body>

    <div>
        <form method="POST">
            ID: 
            <input type="text" id="id" name="id"> 
            <br>          
            Nome:            
            <input type="text" id="nome" name="nome">
            <br>             
            Senha:            
            <input type="text" id="senha" name="senha">
            <br><br>
            <button type="submit" name="cadastar" id="submitButton">Cadastar</button>
            <br><br>
        </form>    
    </div>

    <div>
        <form method="POST">            
            <button type="submit" name="listar" id="submitButton">Listar</button>
        </form> 

        <?php if (!empty($usuarios)): ?>
            <h3> Usuarios Cadastrados:</h3>
            <table>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>SENHA</th>
                </tr>
                <?php foreach($usuarios as $usuario): ?>
                    <tr>
                        <td><?= htmlspecialchars($usuario['id']) ?></td>
                        <td><?= htmlspecialchars($usuario['nome']) ?></td>
                        <td><?= htmlspecialchars($usuario['senha']) ?></td>
                        <td>
                            <form method="GET">
                                <a name="deletar" href="?delete_id=<?=$usuario['id']?>" onclick="return confirm('Tem certeza que deseja remover este usuario?')">
                                    <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/filled-trash.png"   alt="filled-trash"/>
                                </a>
                            </form>
                        </td>
                        <td>
                            <button type="button" onclick="carregaDados(
                                '<?= htmlspecialchars($usuario['id']) ?>',
                                '<?= htmlspecialchars($usuario['nome']) ?>',
                                '<?= htmlspecialchars($usuario['senha']) ?>')" >
                                 <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/edit--v1.png"   alt="edit--v1"/>
                            </button> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Nenhum usuario encontrado.</p>
        <?php endif; ?>
    </div>


    
</body>
</html>