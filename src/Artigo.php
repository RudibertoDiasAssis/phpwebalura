<?php

class Artigo
{   
    private $mysql;
    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function exibirTodos(): array
    {
        $results = $this->mysql->query('SELECT id, titulo, conteudo from artigos');
        $artigos = $results->fetch_all(MYSQLI_ASSOC);
        
        return $artigos;
    }

    public function encontrarId (string $id): array
    {
        $selecionaArtigo = $this->mysql->prepare("SELECT id, titulo, conteudo FROM artigos where id = ?");
        $selecionaArtigo->bind_param('s', $id);
        $selecionaArtigo->execute();
        $artigo = $selecionaArtigo->get_result()->fetch_assoc();
        return $artigo;
    }
}
