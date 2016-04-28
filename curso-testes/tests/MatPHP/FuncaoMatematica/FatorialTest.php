<?php

use \MatPHP\FuncaoMatematica\Fatorial;

class FatorialTest extends \PHPUnit_Framework_TestCase
{

    public function testCalculoDeFatorial()
    {
        $fat3 = new Fatorial(3);
        $esperado = 6;
        $resultado = $fat3->executar();
        $this->assertEquals($esperado, $resultado);
        
        $fat4 = new Fatorial(4);
        $esperado = 24;
        $resultado = $fat4->executar();
        $this->assertEquals($esperado, $resultado);
        
        $fat5 = new Fatorial(5);
        $esperado = 120;
        $resultado = $fat5->executar();
        $this->assertEquals($esperado, $resultado);
        
        $fat10 = new Fatorial(10);
        $esperado = 3628800;
        $resultado = $fat10->executar();
        $this->assertEquals($esperado, $resultado);
    }
    
    public function testFatorialDeUm()
    {
        $fat = new Fatorial(1);
        $esperado = 1;
        $resultado = $fat->executar();
        $this->assertEquals($esperado, $resultado);
    }
    
    public function testFatorialDeZero()
    {
        $fat = new Fatorial(0);
        $esperado = 1;
        $resultado = $fat->executar();
        $this->assertEquals($esperado, $resultado);
    }
    
    /**
     * @expectedException \MatPHP\FuncaoMatematica\FatorialNegativoException
     * @expectedExceptionMessage Fatorial de número negativo não existe!
     */
    public function testFatorialNegativoNaoExiste()
    {
        $fat = new Fatorial(-1);
        $fat->executar();
        
        $fat = new Fatorial(-2);
        $fat->executar();
        
        $fat = new Fatorial(-100);
        $fat->executar();
    }
    
    /**
     * @expectedException \MatPHP\FuncaoMatematica\FatorialNaoInteiroException
     */
    public function testFatorialSoAceitaInteiroPositivo()
    {
        $fat = new Fatorial(2.5);
        $fat->executar();
        
        $fat = new Fatorial('skjv');
        $fat->executar();
    }

}
