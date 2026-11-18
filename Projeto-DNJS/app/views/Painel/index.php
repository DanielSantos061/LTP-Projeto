<!DOCTYPE html>
<html lang+"pt-br">
<head>
     <meta charset="UTF-8">
     <title>Página Principal - Sistema</title>
     </head>
     <body>
        <head style="background: #f4f4f4; padding: 10px;
        display: flex; justify-content: space-between;
        align-items: center;">
        <h1> painel do sistema</h1>
        <div>
            Olá, <strong><?= $_SESSION['usuario_nome'] ?>
</strong> (perfil: <em><?= strtoupper($_SESSION[
    'usuario_perfil']) ?></em>)  |
    <a href="index.php?controller=login&action=sair"
    style="color: red; font-weight: bold;">sair</a>
</div>
</header>
<main style=""padding: 20px;">
<h2> bem-Vindo ao sistema acadêmico base!</h2>
<p>Este é o esqueleto da sua página principal. Aqui
    você pode aplicar po seu tema, CSS, Bootstrap ou criar seus cards.</p>
    <hr>

    <h3>Menu de navegação do projeto:</h3>
    <ul>
        <li><a hre=
        "index.php?controller=usuario$action=index">
        Gerenciar usuarios (CRUD)</a></li>

        <li><a href="#" onclick="alert('Espaço para o aluno criar o ClienteController!">GERENCIAR
        CLIENTES (Desafio do aluno)</a></li>
</ul>
</main>

<footer style="margin-top: 50px; text-align: ceneter;
color: #777;">
<p>Disciplina LTP2 - professor Welligton</p>
  </footer>
</body>
</html>
