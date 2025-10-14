<?php
namespace App\Domain;

use App\Contracts\ProductValidator;

class SimpleProductValidator implements ProductValidator
{
    // Valida os dados do produto e retorna uma lista de mensagens de erro
    public function validate(array $dados): array
    {
        $erros = [];

        // Pega o nome do produto, tira espaços em branco no começo e fim
        $nome = trim((string)($dados['name'] ?? ''));

        // Pega o preço enviado
        $preco = $dados['price'] ?? null;

        // Verifica se o nome tem entre 2 e 100 caracteres
        if ($nome === '' || mb_strlen($nome) < 2 || mb_strlen($nome) > 100) {
            $erros[] = 'name: deve ter entre 2 e 100 caracteres';
        }

        // Verifica se preço é número e não negativo
        if (!is_numeric($preco) || floatval($preco) < 0) {
            $erros[] = 'price: deve ser numérico e >= 0';
        }

        return $erros;
    }
}
