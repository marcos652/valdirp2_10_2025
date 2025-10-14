<?php
namespace App\Application;

use App\Contracts\ProductRepository;
use App\Contracts\ProductValidator;

class ProductService
{
    private ProductRepository $repositorio;
    private ProductValidator $validador;

    public function __construct(ProductRepository $repositorio, ProductValidator $validador)
    {
        $this->repositorio = $repositorio;
        $this->validador = $validador;
    }

    // Função para criar um novo produto
    public function create(array $dados): array
    {
        // Valida os dados recebidos
        $erros = $this->validador->validate($dados);
        if (!empty($erros)) {
            return ['ok' => false, 'errors' => $erros];
        }

        // Pega todos os produtos para encontrar o maior ID atual
        $todosProdutos = $this->repositorio->findAll();
        $maiorId = 0;
        foreach ($todosProdutos as $produto) {
            $maiorId = max($maiorId, (int)$produto['id']);
        }
        $novoId = $maiorId + 1;

        // Prepara o novo produto com ID, nome e preço já formatados
        $produtoNovo = [
            'id' => $novoId,
            'name' => trim((string)$dados['name']),
            'price' => (float)$dados['price']
        ];

        // Salva o produto no repositório
        $this->repositorio->save($produtoNovo);

        // Retorna sucesso com os dados do produto criado
        return ['ok' => true, 'product' => $produtoNovo];
    }

    // Função para listar todos os produtos cadastrados
    public function list(): array
    {
        return $this->repositorio->findAll();
    }
}
