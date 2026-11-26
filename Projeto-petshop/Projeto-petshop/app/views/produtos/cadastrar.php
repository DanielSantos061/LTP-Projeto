<?php require __DIR__ . '/../painel/topo.php'; ?>

    <div class="form-card">
      <h2>Novo produto 🦴</h2>

      <?php if (isset($erro)): ?>
        <p class="alert-error"><?= htmlspecialchars($erro) ?></p>
      <?php endif; ?>

      <form action="index.php?controller=produto&action=cadastrar" method="POST">
        <?php require __DIR__ . '/_form.php'; ?>
        <button type="submit" class="btn-submit">Salvar</button>
      </form>

      <p><a class="link-voltar" href="index.php?controller=produto&action=index">← Voltar à lista</a></p>
    </div>

<?php require __DIR__ . '/../painel/footer.php'; ?>
