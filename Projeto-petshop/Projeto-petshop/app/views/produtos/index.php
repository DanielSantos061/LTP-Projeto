<?php require __DIR__ . '/../painel/topo.php'; ?>

    <div class="barra-titulo">
      <h2>Produtos 🦴</h2>
      <a class="btn btn-primario" href="index.php?controller=produto&action=cadastrar">+ Novo produto</a>
    </div>

    <div class="tabela-wrap">
      <table class="tabela">
        <thead>
          <tr><th>ID</th><th>Produto</th><th>Categoria</th><th>Preço</th><th>Estoque</th><th>Ações</th></tr>
        </thead>
        <tbody>
        <?php if (empty($produtos)): ?>
          <tr><td colspan="6">Nenhum produto cadastrado ainda.</td></tr>
        <?php endif; ?>
        <?php foreach ($produtos as $p): ?>
          <tr>
            <td><?= (int)$p['id'] ?></td>
            <td><?= htmlspecialchars($p['nome']) ?></td>
            <td><span class="badge"><?= htmlspecialchars($p['categoria']) ?></span></td>
            <td>R$ <?= number_format((float)$p['preco'], 2, ',', '.') ?></td>
            <td><?= (int)$p['estoque'] ?></td>
            <td class="acoes">
              <a class="btn btn-secundario" href="index.php?controller=produto&action=editar&id=<?= (int)$p['id'] ?>">Editar</a>
              <a class="btn btn-perigo" href="index.php?controller=produto&action=excluir&id=<?= (int)$p['id'] ?>"
                 onclick="return confirm('Excluir este produto?')">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <p><a class="link-voltar" href="index.php?controller=painel&action=index">← Voltar ao painel</a></p>

<?php require __DIR__ . '/../painel/footer.php'; ?>
