<?php

namespace MatPHP\FuncaoMatematica;

class FatorialNaoInteiroException extends \Exception
{
    public function __construct()
    {
        $this->message = 'Fatorial só pode ser calculado com números inteiros positivos!';
    }
}
