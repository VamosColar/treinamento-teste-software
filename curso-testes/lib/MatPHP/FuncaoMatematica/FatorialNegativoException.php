<?php

namespace MatPHP\FuncaoMatematica;

class FatorialNegativoException extends \Exception
{
    public function __construct()
    {
        $this->message = 'Fatorial de número negativo não existe!';
    }
}
