<?php

namespace MatPHP\FuncaoMatematica;

trait DecomposicaoDeFatores
{

    public function fatores($num)
    {
        $fatores = [];
        $primos = self::primos();
        reset($primos);
        while ($num !== 1) {
            $primo = current($primos);
            if ($num % $primo === 0) {
                $fatores[$primo] = isset($fatores[$primo]) ? ++$fatores[$primo] : 1;
                $num /= $primo;
            } else
                next($primos);
        }
        return $fatores;
    }
    
    private static function primos()
    {
        return [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41,
                43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97];
    }
}
