<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Infra\FileUserRepository;
use App\Application\ListUsersService;

// Cria o repositório que lê os usuários do arquivo
$repositorioUsuarios = new FileUserRepository(__DIR__ . '/../storage/users.txt');

// Cria o serviço que lista os usuários
$servicoListaUsuarios = new ListUsersService($repositorioUsuarios);

// Busca todos os usuários
$usuarios = $servicoListaUsuarios->list();
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listagem de Usuários</title>
</head>
<body>

<h1>Usuários</h1>

<?php if (empty($usuarios)): ?>
    <p>Nenhum usuário cadastrado.</p>
<?php else: ?>
    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= htmlspecialchars($usuario['id']) ?></td>
                    <td><?= htmlspecialchars($usuario['name']) ?></td>
                    <td><?= htmlspecialchars($usuario['email']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

</body>
</html>
