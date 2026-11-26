<?php require __DIR__ . '/../painel/topo.php'; ?>

    <div class="barra-titulo">
      <h2>Clientes e Pets 🐕</h2>
      <a class="btn btn-primario" href="index.php?controller=cliente&action=cadastrar">+ Novo cliente</a>
    </div>

    <div class="tabela-wrap">
      <table class="tabela">
        <thead>
          <tr><th>ID</th><th>Cliente</th><th>Telefone</th><th>E-mail</th><th>Pet</th><th>Espécie</th><th>Raça</th><th>Ações</th></tr>
        </thead>
        <tbody>
        <?php if (empty($clientes)): ?>
          <tr><td colspan="8">Nenhum cliente cadastrado ainda.</td></tr>
        <?php endif; ?>
        <?php foreach ($clientes as $c): ?>
          <tr>
            <td><?= (int)$c['id'] ?></td>
            <td><?= htmlspecialchars($c['nome']) ?></td>
            <td><?= htmlspecialchars($c['telefone']) ?></td>
            <td><?= htmlspecialchars($c['email'] ?? '') ?></td>
            <td><?= htmlspecialchars($c['pet_nome']) ?></td>
            <td><span class="badge"><?= htmlspecialchars($c['pet_especie']) ?></span></td>
            <td><?= htmlspecialchars($c['pet_raca'] ?? '') ?></td>
            <td class="acoes">
              <a class="btn btn-secundario" href="index.php?controller=cliente&action=editar&id=<?= (int)$c['id'] ?>">Editar</a>
              <a class="btn btn-perigo" href="index.php?controller=cliente&action=excluir&id=<?= (int)$c['id'] ?>"
                 onclick="return confirm('Excluir este cliente?')">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <p><a class="link-voltar" href="index.php?controller=painel&action=index">← Voltar ao painel</a></p>

<?php require __DIR__ . '/../painel/footer.php'; ?>
