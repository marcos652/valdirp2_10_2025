<?php
namespace App\Contracts;

// Interface que define como armazenar e buscar produtos
interface ProductRepository
{
    /**
     * Salva um produto.
     * @param array{id:int, name:string, price:float} $produto  - dados do produto a salvar
     * @return bool  - indica se salvou com sucesso
     */
    public function save(array $produto): bool;

    /**
     * Retorna todos os produtos cadastrados.
     * @return array<int, array{id:int, name:string, price:float}>  - lista de produtos
     */
    public function findAll(): array;
}
