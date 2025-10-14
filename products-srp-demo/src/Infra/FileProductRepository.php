<?php
namespace App\Infra;

use App\Contracts\ProductRepository;

class FileProductRepository implements ProductRepository
{
    private string $caminhoArquivo;

    // Recebe o caminho do arquivo onde os produtos serão salvos
    public function __construct(string $caminhoArquivo)
    {
        $this->caminhoArquivo = $caminhoArquivo;
    }

    // Salva um produto no arquivo (uma linha em JSON)
    public function save(array $produto): bool
    {
        $linha = json_encode($produto, JSON_UNESCAPED_UNICODE);
        // Adiciona a linha no arquivo, com trava para evitar erros de escrita simultânea
        return (bool) file_put_contents($this->caminhoArquivo, $linha . PHP_EOL, FILE_APPEND | LOCK_EX);
    }

    // Lê todos os produtos do arquivo, decodificando cada linha JSON para array
    public function findAll(): array
    {
        if (!is_file($this->caminhoArquivo)) {
            return []; // arquivo não existe ainda, retorna vazio
        }

        $linhas = file($this->caminhoArquivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $produtos = [];

        foreach ($linhas as $linha) {
            $dados = json_decode($linha, true);
            if (is_array($dados)) {
                $produtos[] = $dados;
            }
        }

        return $produtos;
    }
}
