<?php

namespace MatPHP\FuncaoMatematica;

class MDC implements Funcao
{
    use DecomposicaoDeFatores;

    private $numeros;

    public function __construct(...$nums)
    {
        if (count($nums) <= 1)
            throw new MDCParametrosInsuficientesException;
        $this->numeros = $nums;
    }
    
    public function executar()
    {
        $fatores = [];
        foreach ($this->numeros as $num)
            $fatores[] = $this->fatores($num);
            
        return $this->mdc($fatores);
    }
    
    private function mdc($fatores)
    {
        $fatores_comuns = [];
        $primos = self::primos();
        foreach ($primos as $primo) {
            $fatores_comuns[$primo] = PHP_INT_MAX;
            foreach ($fatores as $fator) {
                if (!isset($fator[$primo])) {
                    $fatores_comuns[$primo] = 0;
                    break;
                } elseif ($fatores_comuns[$primo] > $fator[$primo])
                    $fatores_comuns[$primo] = $fator[$primo];
            }
        }
        array_walk($fatores_comuns, function (&$valor, $chave) {
            $valor = $chave ** $valor;
        });
        
        return array_product($fatores_comuns);
    }
}
