<?php /* Styled light-blue login page */ ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
  <main class="auth">
    <section class="card">
      <div class="card-header">
        <div class="brand">
          <div class="brand-badge">IN</div>
          <div>
            <h1 class="card-title">Bem-vindo</h1>
            <p class="card-sub">Entre com suas credenciais</p>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form method="POST" action="./routers/loginRouter.php?acao=validarLogin">
          <div class="field">
            <label for="nome">Nome</label>
            <input id="nome" type="text" name="nome" placeholder="Seu nome" required />
          </div>
          <div class="field">
            <label for="senha">Senha</label>
            <input id="senha" type="password" name="senha" placeholder="Sua senha" required />
          </div>
          <div class="actions">
            <button id="btn_login" class="btn" type="submit">Entrar</button>
          </div>
        </form>
        <p class="hint">Dica: use uma senha forte.</p>
      </div>
    </section>
  </main>
</body>
</html>
