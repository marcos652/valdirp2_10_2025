<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Infra\FileProductRepository;
use App\Domain\SimpleProductValidator;
use App\Application\ProductService;

// Cria o repositório, validador e serviço
$repositorio = new FileProductRepository(__DIR__ . '/../storage/products.txt');
$validador = new SimpleProductValidator();
$produtoService = new ProductService($repositorio, $validador);

// Busca todos os produtos cadastrados
$produtos = $produtoService->list();
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Lista de Produtos</title>
</head>
<body>
  <h1>Produtos</h1>
  <p><a href="index.php">Cadastrar novo produto</a></p>

  <?php if (empty($produtos)): ?>
    <p>[translate:Nenhum produto cadastrado.]</p>
  <?php else: ?>
    <table border="1" cellpadding="6" cellspacing="0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Preço</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($produtos as $produto): ?>
          <tr>
            <td><?= htmlspecialchars($produto['id']) ?></td>
            <td><?= htmlspecialchars($produto['name']) ?></td>
            <td><?= number_format((float)$produto['price'], 2, ',', '.') ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</body>
</html>

