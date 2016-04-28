<?php

namespace MatPHP\FuncaoMatematica;

class MDCParametrosInsuficientesException extends \Exception
{
    public function __construct()
    {
        $this->message = 'MDC precisa de no mínimo 2 parâmetros';
    }
}
