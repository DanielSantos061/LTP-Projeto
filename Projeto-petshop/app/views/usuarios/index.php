<?php require __DIR__ . '/../painel/topo.php'; ?>

    <div class="barra-titulo">
      <h2>Equipe do Pet Shop</h2>
      <a class="btn btn-primario" href="index.php?controller=usuario&action=cadastrar">+ Novo usuário</a>
    </div>

    <div class="tabela-wrap">
      <table class="tabela">
        <thead>
          <tr><th>ID</th><th>Nome</th><th>Login</th><th>Perfil</th><th>Ações</th></tr>
        </thead>
        <tbody>
        <?php foreach ($usuarios as $u): ?>
          <tr>
            <td><?= (int)$u['id'] ?></td>
            <td><?= htmlspecialchars($u['nome']) ?></td>
            <td><?= htmlspecialchars($u['login']) ?></td>
            <td><span class="badge"><?= htmlspecialchars($u['perfil']) ?></span></td>
            <td class="acoes">
              <a class="btn btn-secundario" href="index.php?controller=usuario&action=editar&id=<?= (int)$u['id'] ?>">Editar</a>
              <a class="btn btn-perigo" href="index.php?controller=usuario&action=excluir&id=<?= (int)$u['id'] ?>"
                 onclick="return confirm('Excluir este usuário?')">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <p><a class="link-voltar" href="index.php?controller=painel&action=index">← Voltar ao painel</a></p>

<?php require __DIR__ . '/../painel/footer.php'; ?>
