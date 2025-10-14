# products-srp-demo — Cadastro e Listagem de Produtos (Exercício 2)

## Estrutura
- `src/Contracts` - contratos (ProductRepository, ProductValidator)
- `src/Infra` - FileProductRepository (I/O)
- `src/Domain` - SimpleProductValidator (validação)
- `src/Application` - ProductService (orquestra)
- `public/` - index.php (form), create.php (POST), products.php (lista)
- `storage/products.txt` - persistência (JSON por linha)

## Como rodar (Windows + XAMPP)
1. Copie `products-srp-demo` para `C:\xampp\htdocs\products-srp-demo`.
2. Na pasta do projeto, rode (se tiver Composer):
   ```
   composer dump-autoload
   ```
   Isso gera `vendor/autoload.php` esperado pelos `public/*.php`.
3. Garanta que `storage/` é gravável pelo servidor web.
4. Acesse: `http://localhost/products-srp-demo/public/`

## Casos de teste manuais (documentados)
1. Cadastro válido:
   - name: Teclado, price: 120.50 → HTTP 201 redireciona para a lista; item aparece.
2. Nome curto:
   - name: T, price: 50 → retornará mensagem de validação (422 sem header explicit).
3. Preço negativo:
   - name: Mouse, price: -10 → mensagem de validação.
4. Lista vazia:
   - NÃO há produtos em `storage/products.txt` → exibirá "Nenhum produto cadastrado".
5. IDs incrementais:
   - Ao inserir múltiplos produtos, os IDs são calculados lendo o arquivo e incrementando.

## Observações técnicas
- PSR-4 autoload configurado em composer.json (namespace App\ -> src/).
- ProductService não faz I/O direto; usa o repositório e validador.
- O código é minimalista para facilitar revisão; para produção, adicione tratamento de concorrência/lock mais robusto.

