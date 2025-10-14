# solid-srpdemo — Listagem de usuários (Exercício 1)

## O que há aqui
Projeto demo pequeno que expõe uma rota `public/users.php` que lista usuários lidos de `storage/users.txt`.
Segue SRP: I/O no repositório (`FileUserRepository`), orquestração no `ListUsersService` e view apenas em `public/users.php`.

## Como rodar (Windows + XAMPP)
1. Copie a pasta `solid-srpdemo` para `C:\xampp\htdocs\` (ou equivalente). O caminho final deve ficar assim:
   `C:\xampp\htdocs\solid-srpdemo\public\users.php`
2. Abra um terminal e rode, a partir da pasta `solid-srpdemo`, (se tiver Composer instalado):
   ```
   composer dump-autoload
   ```
   Isso gera `vendor/autoload.php`. Se você não usar Composer, crie manualmente um autoloader ou inclua os arquivos.
3. Verifique permissões de escrita/leitura em `storage/`.
4. Acesse no navegador:
   `http://localhost/solid-srpdemo/public/users.php`

## Observações
- Teste com arquivo vazio: renomeie `storage/users.txt` temporariamente para simular nenhum usuário.
- Para adicionar usuários, adicione linhas JSON no arquivo `storage/users.txt`, 1 JSON por linha, por exemplo:
  `{"id":3,"name":"Maria","email":"maria@example.com"}`

