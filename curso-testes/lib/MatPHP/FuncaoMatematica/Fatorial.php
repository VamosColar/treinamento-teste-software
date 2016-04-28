<?php

namespace MatPHP\FuncaoMatematica;

class Fatorial implements Funcao
{
    private $numero;

    public function __construct($num)
    {
        $this->numero = $num;
    }
    
    public function executar()
    {
        return $this->calculo($this->numero);
    }
    
    private function calculo($num)
    {
        if (!is_int($num))
            throw new  FatorialNaoInteiroException();
        if ($num < 0)
            throw new FatorialNegativoException();
        if ($num === 0 || $num === 1)
            return 1;
        return $num * $this->calculo($num -1);
    }
}
