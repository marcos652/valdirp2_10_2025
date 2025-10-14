<?php
namespace App\Contracts;

// Interface que define como validar os dados de um produto
interface ProductValidator
{
    /**
     * Valida os dados do produto recebidos.
     * @param array{name:string, price:mixed} $dados - dados do produto para validar
     * @return array - lista com mensagens de erro (vazia se não houver erros)
     */
    public function validate(array $dados): array;
}
