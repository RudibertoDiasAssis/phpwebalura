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
}
