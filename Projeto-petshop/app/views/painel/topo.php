<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Painel - Patinhas Felizes Pet Shop</title>
  <link rel="stylesheet" href="public/css/estilo.css">
</head>
<body class="pagina-painel">

  <header class="topo">
    <div class="container topo-conteudo">
      <a class="marca" href="index.php?controller=painel&action=index">🐾 Painel do Pet Shop</a>

      <div class="usuario-info">
        Olá, <strong><?= htmlspecialchars($_SESSION['usuario_nome']) ?></strong>
        <span class="badge"><?= htmlspecialchars(strtoupper($_SESSION['usuario_perfil'])) ?></span>
        <a class="link-sair" href="index.php?controller=login&action=sair">Sair</a>
      </div>
    </div>
  </header>

  <main class="container conteudo">
