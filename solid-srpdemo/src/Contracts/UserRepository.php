<?php
namespace App\Contracts;

// Interface que define como buscar usuários
interface UserRepository
{
    /**
     * Retorna todos os usuários cadastrados.
     * @return array<int, array{ id:int, name:string, email:string }> - lista de usuários
     */
    public function findAll(): array;
}
