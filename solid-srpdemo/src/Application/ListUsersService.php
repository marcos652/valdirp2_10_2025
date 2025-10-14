<?php
namespace App\Application;

use App\Contracts\UserRepository;

class ListUsersService
{
    private UserRepository $repositorio;

    // Recebe o repositório que vai buscar os usuários
    public function __construct(UserRepository $repositorio)
    {
        $this->repositorio = $repositorio;
    }

    // Retorna a lista de todos os usuários cadastrados
    public function list(): array
    {
        return $this->repositorio->findAll();
    }
}
