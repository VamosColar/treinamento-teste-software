<?php

namespace Entidade;

class Modulo extends Entidade
{
    public $nome;
    public $rota;
    
    public function __construct($nome, $rota)
    {
        $this->nome = $nome;
        $this->rota = $rota;
    }
}
