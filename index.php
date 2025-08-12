<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="POST" action="./routers/loginRouter.php?acao=validarLogin">
        <div>
            <input type="text" name="nome" placeholder="Nome">
            <input type="text" name="senha" placeholder="Senha">
            <button type="submit"> Logar</button>
        </div>
    </form>
</body>
</html>