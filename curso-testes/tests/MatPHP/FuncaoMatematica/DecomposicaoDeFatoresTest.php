<?php

use MatPHP\FuncaoMatematica\DecomposicaoDeFatores;

class DecomposicaoDeFatoresTest extends \PHPUnit_Framework_TestCase
{
    public function testCalculoDeFatores()
    {
        $mock = $this->getMockForTrait(DecomposicaoDeFatores::class);
        $this->assertEquals([2 => 1, 5 => 1], $mock->fatores(10));
        $this->assertEquals([2 => 2, 3 => 1], $mock->fatores(12));
        $this->assertEquals([2 => 4], $mock->fatores(16));
        $this->assertEquals([2 => 1, 11 => 1], $mock->fatores(22));
        $this->assertEquals([3 => 1, 13 => 1], $mock->fatores(39));
        $this->assertEquals([2 => 4, 3 =>1], $mock->fatores(48));
        $this->assertEquals([2 => 3, 7 => 1], $mock->fatores(56));
        $this->assertEquals([3 => 2, 7 => 1], $mock->fatores(63));
        $this->assertEquals([2 => 1, 3 => 1, 13 => 1], $mock->fatores(78));
    }
    
    public function testCalculoDeFatoresDePrimos()
    {
        $mock = $this->getMockForTrait(DecomposicaoDeFatores::class);
        $this->assertEquals([7 => 1], $mock->fatores(7));
        $this->assertEquals([13 => 1], $mock->fatores(13));
        $this->assertEquals([67 => 1], $mock->fatores(67));
        $this->assertEquals([73 => 1], $mock->fatores(73));
    }
}
