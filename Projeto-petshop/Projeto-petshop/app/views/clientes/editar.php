<?php require __DIR__ . '/../painel/topo.php'; ?>

    <div class="form-card">
      <h2>Editar cliente ✏️</h2>

      <?php if (isset($erro)): ?>
        <p class="alert-error"><?= htmlspecialchars($erro) ?></p>
      <?php endif; ?>

      <form action="index.php?controller=cliente&action=editar&id=<?= (int)$cliente['id'] ?>" method="POST">
        <?php require __DIR__ . '/_form.php'; ?>
        <button type="submit" class="btn-submit">Salvar alterações</button>
      </form>

      <p><a class="link-voltar" href="index.php?controller=cliente&action=index">← Voltar à lista</a></p>
    </div>

<?php require __DIR__ . '/../painel/footer.php'; ?>
