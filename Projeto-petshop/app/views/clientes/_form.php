<?php
  // Campos compartilhados entre cadastrar e editar
  // Usa $cliente (edição) ou os dados enviados no POST (cadastro com erro)
  $v = $cliente ?? $_POST;
  $campo = function ($nome) use ($v) { return htmlspecialchars($v[$nome] ?? ''); };
?>
        <div class="form-group">
          <label for="nome">Nome do cliente:</label>
          <input type="text" id="nome" name="nome" required value="<?= $campo('nome') ?>">
        </div>
        <div class="form-group">
          <label for="telefone">Telefone:</label>
          <input type="text" id="telefone" name="telefone" required value="<?= $campo('telefone') ?>">
        </div>
        <div class="form-group">
          <label for="email">E-mail:</label>
          <input type="email" id="email" name="email" value="<?= $campo('email') ?>">
        </div>
        <div class="form-group">
          <label for="pet_nome">Nome do pet:</label>
          <input type="text" id="pet_nome" name="pet_nome" required value="<?= $campo('pet_nome') ?>">
        </div>
        <div class="form-group">
          <label for="pet_especie">Espécie:</label>
          <select id="pet_especie" name="pet_especie" required>
            <?php foreach (['Cachorro', 'Gato', 'Coelho', 'Hamster', 'Ave', 'Outro'] as $esp): ?>
              <option value="<?= $esp ?>" <?= ($v['pet_especie'] ?? '') === $esp ? 'selected' : '' ?>><?= $esp ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="pet_raca">Raça:</label>
          <input type="text" id="pet_raca" name="pet_raca" value="<?= $campo('pet_raca') ?>">
        </div>
