<?php
namespace App\Infra;

use App\Contracts\UserRepository;

class FileUserRepository implements UserRepository
{
    private string $caminhoArquivo;

    // Recebe o caminho do arquivo onde os usuários estão armazenados
    public function __construct(string $caminhoArquivo)
    {
        $this->caminhoArquivo = $caminhoArquivo;
    }

    /**
     * Lê todos os usuários do arquivo, retornando uma lista.
     * Cada linha do arquivo é um JSON com os dados do usuário.
     *
     * @return array<int, array{id:int, name:string, email:string}>
     */
    public function findAll(): array
    {
        // Se o arquivo não existir, retorna lista vazia
        if (!is_file($this->caminhoArquivo)) {
            return [];
        }

        // Lê todas as linhas do arquivo, ignorando linhas vazias
        $linhas = file($this->caminhoArquivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $usuarios = [];

        // Para cada linha, decodifica o JSON e adiciona na lista se válido
        foreach ($linhas as $linha) {
            $dados = json_decode($linha, true);
            if (is_array($dados)) {
                $usuarios[] = $dados;
            }
        }

        return $usuarios;
    }
}

