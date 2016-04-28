<?php

use MatPHP\FuncaoMatematica\MDC;

class MDCTest extends \PHPUnit_Framework_TestCase
{

    public function valores()
    {
        return [
            [2,4,18],
            [4,12,16],
            [2,10,12,16],
            [2,16,18,24],
            [6,36,54,24],
            [14,28,70,98]
        ];
    }

    /**
     * @group TesteDeCalculo
     * @requires PHP 7.0.5
     * @dataProvider valores
     */
    public function testCalculo_do_MDC($esperado, ...$args)
    {
        $mdc = new MDC(...$args);
        $this->assertEquals($esperado, $mdc->executar());
    }
    
    /**
     * @expectedException MatPHP\FuncaoMatematica\MDCParametrosInsuficientesException
     */
    public function testMDC_com_Parametros_Insuficientes()
    {
        $mdc = new MDC(10);
    }

}
