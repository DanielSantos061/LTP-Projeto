<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Patinhas Felizes Pet Shop</title>
    <link rel="stylesheet" href="public/css/estilo.css">
</head>
<body>
    <div class="login-card">
        <div class="login-header">
            <div class="login-logo">🐾</div>
            <h2>Patinhas Felizes</h2>
            <p>Acesso ao sistema do Pet Shop</p>
        </div>

        <?php if (isset($erro)): ?>
            <p class="alert-error"><?= htmlspecialchars($erro) ?></p>
        <?php endif; ?>

        <form action="index.php?controller=login&action=logar" method="POST">
            <div class="form-group">
                <label for="login">Login:</label>
                <input type="text" id="login" name="login" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <button type="submit" class="btn-submit">Entrar</button>
        </form>
    </div>
</body>
</html>
