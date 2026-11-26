<?php require __DIR__ . '/../painel/topo.php'; ?>

    <div class="form-card">
      <h2>Novo usuário 🐾</h2>

      <?php if (isset($erro)): ?>
        <p class="alert-error"><?= htmlspecialchars($erro) ?></p>
      <?php endif; ?>

      <form action="index.php?controller=usuario&action=cadastrar" method="POST">
        <div class="form-group">
          <label for="nome">Nome:</label>
          <input type="text" id="nome" name="nome" required value="<?= htmlspecialchars($_POST['nome'] ?? '') ?>">
        </div>
        <div class="form-group">
          <label for="login">Login:</label>
          <input type="text" id="login" name="login" required value="<?= htmlspecialchars($_POST['login'] ?? '') ?>">
        </div>
        <div class="form-group">
          <label for="senha">Senha:</label>
          <input type="password" id="senha" name="senha" required>
        </div>
        <div class="form-group">
          <label for="perfil">Perfil:</label>
          <select id="perfil" name="perfil" required>
            <option value="admin">Administrador</option>
            <option value="atendente">Atendente</option>
            <option value="veterinario">Veterinário(a)</option>
            <option value="tosador">Banho e Tosa</option>
          </select>
        </div>
        <button type="submit" class="btn-submit">Salvar</button>
      </form>

      <p><a class="link-voltar" href="index.php?controller=usuario&action=index">← Voltar à lista</a></p>
    </div>

<?php require __DIR__ . '/../painel/footer.php'; ?>
