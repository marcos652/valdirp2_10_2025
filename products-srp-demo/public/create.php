<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Infra\FileProductRepository;
use App\Domain\SimpleProductValidator;
use App\Application\ProductService;

// Cria as dependências do sistema
$repositorio = new FileProductRepository(__DIR__ . '/../storage/products.txt');
$validador = new SimpleProductValidator();
$produtoService = new ProductService($repositorio, $validador);

// Captura os dados enviados pelo formulário
$nome = $_POST['name'] ?? '';
$preco = $_POST['price'] ?? null;

// Envia os dados para serem processados
$resultado = $produtoService->create(['name' => $nome, 'price' => $preco]);

// Se der tudo certo, redireciona para a lista de produtos
if ($resultado['ok']) {
    http_response_code(201);
    header('Location: products.php');
    exit;
}
?>

<!doctype html>
<html>
  <body>
    <h1>Erro ao criar produto</h1>
    <ul>
      <?php foreach ($resultado['errors'] as $erro): ?>
        <li><?= htmlspecialchars($erro) ?></li>
      <?php endforeach; ?>
    </ul>

    <p><a href="index.php">Voltar</a></p>
  </body>
</html>
