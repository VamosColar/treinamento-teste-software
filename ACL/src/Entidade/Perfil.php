<?php

namespace Entidade;

class Perfil extends Entidade
{
    public $nome;
    public $permissoes;
    
    public function __construct($nome, $permissoes)
    {
        $this->nome = $nome;
        $this->permissoes = $permissoes;
    }
}
