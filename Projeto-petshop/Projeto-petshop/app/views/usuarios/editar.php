<?php
  require __DIR__ . '/../painel/topo.php';

  // Perfis disponíveis (se o usuário tiver um perfil antigo, ele continua aparecendo)
  $perfis = ['admin' => 'Administrador', 'atendente' => 'Atendente',
             'veterinario' => 'Veterinário(a)', 'tosador' => 'Banho e Tosa'];
  if (!isset($perfis[$usuario['perfil']])) {
      $perfis[$usuario['perfil']] = $usuario['perfil'];
  }
?>

    <div class="form-card">
      <h2>Editar usuário ✏️</h2>

      <?php if (isset($erro)): ?>
        <p class="alert-error"><?= htmlspecialchars($erro) ?></p>
      <?php endif; ?>

      <form action="index.php?controller=usuario&action=editar&id=<?= (int)$usuario['id'] ?>" method="POST">
        <div class="form-group">
          <label for="nome">Nome:</label>
          <input type="text" id="nome" name="nome" required value="<?= htmlspecialchars($usuario['nome']) ?>">
        </div>
        <div class="form-group">
          <label for="login">Login:</label>
          <input type="text" id="login" name="login" required value="<?= htmlspecialchars($usuario['login']) ?>">
        </div>
        <div class="form-group">
          <label for="senha">Nova senha (deixe em branco para manter):</label>
          <input type="password" id="senha" name="senha">
        </div>
        <div class="form-group">
          <label for="perfil">Perfil:</label>
          <select id="perfil" name="perfil" required>
            <?php foreach ($perfis as $valor => $rotulo): ?>
              <option value="<?= htmlspecialchars($valor) ?>" <?= $valor === $usuario['perfil'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($rotulo) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" class="btn-submit">Salvar alterações</button>
      </form>

      <p><a class="link-voltar" href="index.php?controller=usuario&action=index">← Voltar à lista</a></p>
    </div>

<?php require __DIR__ . '/../painel/footer.php'; ?>
