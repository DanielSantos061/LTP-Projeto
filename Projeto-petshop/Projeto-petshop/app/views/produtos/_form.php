<?php
  // Campos compartilhados entre cadastrar e editar
  $v = $produto ?? $_POST;
  $campo = function ($nome) use ($v) { return htmlspecialchars($v[$nome] ?? ''); };
  $categorias = ['Alimentação', 'Petiscos', 'Higiene', 'Acessórios', 'Brinquedos', 'Camas', 'Saúde'];
  // Se o produto tiver uma categoria que não está na lista, ela continua aparecendo
  if (!empty($v['categoria']) && !in_array($v['categoria'], $categorias)) {
      $categorias[] = $v['categoria'];
  }
?>
        <div class="form-group">
          <label for="nome">Nome do produto:</label>
          <input type="text" id="nome" name="nome" required value="<?= $campo('nome') ?>">
        </div>
        <div class="form-group">
          <label for="categoria">Categoria:</label>
          <select id="categoria" name="categoria" required>
            <?php foreach ($categorias as $cat): ?>
              <option value="<?= htmlspecialchars($cat) ?>" <?= ($v['categoria'] ?? '') === $cat ? 'selected' : '' ?>><?= htmlspecialchars($cat) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="preco">Preço (R$):</label>
          <input type="text" id="preco" name="preco" required placeholder="0,00"
                 value="<?= isset($v['preco']) ? htmlspecialchars(number_format((float)str_replace(',', '.', $v['preco']), 2, ',', '')) : '' ?>">
        </div>
        <div class="form-group">
          <label for="estoque">Estoque:</label>
          <input type="number" id="estoque" name="estoque" min="0" required value="<?= $campo('estoque') ?>">
        </div>
