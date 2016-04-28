<?php

use MatPHP\Tipo\{TipoNumerico, RepresentacaoNumerica, NumeroComplexo};

class NumeroComplexoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @group Forma do Numero Complexo
     * @dataProvider valores
     */
    public function testRepresentacaoNumerica($real, $int, $txt)
    {
        //$this->markTestSkipped('Melhorar o uso de RepresentacaoNumerica');
        $num = new NumeroComplexo($real, $int);
        $this->assertEquals($txt, $num->__toString());
    }
    
    /**
     * @group Soma de Numeros Complexos
     * @group Operacoes
     * @dataProvider somas
     */
    public function testSomaDeNumerosComplexos($esperado, ...$args)
    {
        $num1 = new NumeroComplexo($args[0], $args[1]);
        $num2 = new NumeroComplexo($args[2], $args[3]);
        
        $this->assertEquals($esperado, $num1->soma($num2));
        $this->assertEquals($esperado, $num2->soma($num1));
    }
    
    /**
     * @group Subtração de Numeros Complexos
     * @group Operacoes
     * @dataProvider subs
     */
    public function testSubtracaoDeNumerosComplexos($esperado, ...$args)
    {
        $num1 = new NumeroComplexo($args[0], $args[1]);
        $num2 = new NumeroComplexo($args[2], $args[3]);
        
        $this->assertEquals($esperado, $num1->sub($num2));
        $this->assertNotEquals($esperado, $num2->sub($num1));
    }
    
    /**
     * @group Multiplicação de Numeros Complexos
     * @group Operacoes
     * @dataProvider mults
     */
    public function testMultiplicacaoDeNumerosComplexos($esperado, ...$args)
    {
        $num1 = new NumeroComplexo($args[0], $args[1]);
        $num2 = new NumeroComplexo($args[2], $args[3]);
        
        $this->assertEquals($esperado, $num1->mult($num2));
        $this->assertEquals($esperado, $num2->mult($num1));
    }
    
    /**
     * @group get e set
     */
    public function testGetValores()
    {
        $num = new NumeroComplexo(2, 3);
        $this->assertEquals(2, $num->getReal());
        $this->assertEquals(3, $num->getImaginario());
        $num = new NumeroComplexo(-102, -753);
        $this->assertEquals(-102, $num->getReal());
        $this->assertEquals(-753, $num->getImaginario());
    }
    
    public function valores()
    {
        return [
            [2, 5, '2+5i'],
            [-8, 3, '-8+3i'],
            [8, -18, '8-18i'],
            [3.4, 7.1, '3,4+7,1i'],
            [0, 0.4, '0,4i'],
            [0, -8762.876, '-8762,876i']
        ];
    }
    
    public function somas()
    {
        return [
            [new NumeroComplexo(4, 8), 2, 4, 2, 4],
            [new NumeroComplexo(4, 8), 1, 3, 3, 5],
        ];
    }
    
    public function subs()
    {
        return [
            [new NumeroComplexo(1, -1), 2, 4, 1, 5],
            [new NumeroComplexo(-2, -2), 1, 3, 3, 5],
        ];
    }
    
    public function mults()
    {
        return [
            [new NumeroComplexo(-18, 14), 2, 4, 1, 5],
            [new NumeroComplexo(-12, 14), 1, 3, 3, 5],
        ];
    }
}
