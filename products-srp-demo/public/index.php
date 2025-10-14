<?php
// Formulário simples para cadastrar produto
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Cadastrar Produto</title>
</head>
<body>
  <h1>Cadastrar Produto</h1>
  <form method="post" action="create.php">
    <label>Nome do Produto:
      <input type="text" name="name" required>
    </label>
    <br><br>
    <label>Preço (R$):
      <input type="number" name="price" step="0.01" min="0" required>
    </label>
    <br><br>
    <button type="submit">Criar Produto</button>
  </form>
  <p><a href="products.php">Ver lista de produtos</a></p>
</body>
</html>
